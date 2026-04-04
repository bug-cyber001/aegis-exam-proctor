<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aegis Exam Control Center') }}
        </h2>
    </x-slot>

    <script defer src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Live Exams</p>
                    <p class="text-2xl font-bold text-gray-900">0</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">AI Proctoring</p>
                    <p class="text-lg font-bold text-green-600">SYSTEM READY</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-red-500">
                    <p class="text-sm font-medium text-gray-500 uppercase">Flags Today</p>
                    <p id="violation-count" class="text-2xl font-bold text-gray-900">0</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-8 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Quick Actions</h3>
                    <div class="flex space-x-4">
                        <a href="/exams/create" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            + New Exam
                        </a>
                        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md text-xs font-bold uppercase hover:bg-gray-200">
                            View Reports
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 rounded-xl overflow-hidden shadow-2xl border-4 border-gray-800">
                <div class="bg-gray-800 px-4 py-2 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <span id="cam-indicator" class="text-gray-500 text-xs font-mono uppercase tracking-widest">● System Offline</span>
                    </div>
    
                    <div class="flex gap-2">
                        <button id="start-cam" class="bg-emerald-600 hover:bg-emerald-700 text-white text-[10px] font-bold px-3 py-1 rounded transition">
                            START AEGIS
                        </button>
                        <button id="stop-cam" class="bg-red-600 hover:bg-red-700 text-white text-[10px] font-bold px-3 py-1 rounded transition hidden">
                            STOP STREAM
                        </button>
                    </div>
                </div>

                <div class="relative aspect-video bg-black flex items-center justify-center">
                    <video id="webcam" autoplay playsinline muted class="w-full h-full object-cover opacity-100"></video>
                    
                    <div id="ai-warning" class="hidden absolute inset-0 bg-red-600/40 backdrop-blur-sm flex items-center justify-center z-50">
                        <div class="text-center p-6 bg-white rounded-lg shadow-2xl">
                            <h2 class="text-2xl font-black text-red-600 animate-bounce uppercase italic">Warning!</h2>
                            <p class="text-gray-800 font-bold">Subject Not Detected / Integrity Breach</p>
                        </div>
                    </div>

                    <div id="ai-status" class="absolute bottom-4 left-4 bg-emerald-500/20 backdrop-blur-md border border-emerald-500/50 px-3 py-1 rounded text-emerald-400 text-xs font-mono">
                        AI STATUS: WAITING...
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let stream = null;
        let detectionInterval = null;
        let lastViolationTime = 0;

        const video = document.getElementById('webcam');
        const warningOverlay = document.getElementById('ai-warning');
        const statusText = document.getElementById('ai-status');
        const camIndicator = document.getElementById('cam-indicator');
        const startBtn = document.getElementById('start-cam');
        const stopBtn = document.getElementById('stop-cam');

        // Load Models
        async function loadModels() {
            try {
                statusText.innerText = "AI STATUS: LOADING MODELS...";
                const MODEL_URL = 'https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights';
                await faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL);
                statusText.innerText = "AI STATUS: READY";
            } catch (err) {
                statusText.innerText = "AI STATUS: MODEL ERROR";
                console.error(err);
            }
        }

        // Log Violations to Laravel
        async function logViolation(type) {
            const now = Date.now();
            if (now - lastViolationTime < 10000) return; 
            lastViolationTime = now;

            try {
                await fetch('/violations', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ type: type })
                });
                console.log("Aegis: Violation logged.");
            } catch (err) {
                console.error("Aegis: Logging failed.", err);
            }
        }

        // Start Stream & AI
        async function startAegis() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
                
                camIndicator.innerText = "● Live Aegis Stream";
                camIndicator.classList.replace('text-gray-500', 'text-emerald-400');
                camIndicator.classList.add('animate-pulse');
                
                startBtn.classList.add('hidden');
                stopBtn.classList.remove('hidden');

                video.onplay = () => {
                    detectionInterval = setInterval(async () => {
                        if (!stream) return;
                        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions());

                        if (detections.length === 0) {
                            warningOverlay.classList.remove('hidden');
                            statusText.innerText = "AI STATUS: SUBJECT MISSING";
                            statusText.style.background = "rgba(220, 38, 38, 0.5)";
                            logViolation('FACE_MISSING'); 
                        } else {
                            warningOverlay.classList.add('hidden');
                            statusText.innerText = "AI STATUS: ACTIVE & VERIFIED";
                            statusText.style.background = "rgba(16, 185, 129, 0.2)";
                        }
                    }, 500);
                };
            } catch (err) {
                console.error("Camera access denied", err);
                statusText.innerText = "AI STATUS: CAMERA ERROR";
            }
        }

        // Stop Stream & AI
        function stopAegis() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                video.srcObject = null;
                stream = null;
                clearInterval(detectionInterval);
                
                warningOverlay.classList.add('hidden');
                camIndicator.innerText = "● System Offline";
                camIndicator.classList.replace('text-emerald-400', 'text-gray-500');
                camIndicator.classList.remove('animate-pulse');
                
                startBtn.classList.remove('hidden');
                stopBtn.classList.add('hidden');
                statusText.innerText = "AI STATUS: READY";
            }
        }

        // Event Listeners
        startBtn.addEventListener('click', startAegis);
        stopBtn.addEventListener('click', stopAegis);

        // Run model loading
        loadModels();
    </script>
</x-app-layout>