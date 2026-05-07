<x-app-layout>
    <script defer src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>

    <div class="py-12 bg-[#F8FAFC] min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Student Dashboard</h1>
                    <p class="text-xl text-slate-600 mt-2">Welcome back, <span class="font-bold text-slate-800">{{ auth()->user()->name ?? 'Student' }}</span> 👋</p>
                    <p class="text-sm text-slate-500 mt-1">Ready to begin your next exam?</p>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white border border-slate-200 hover:border-red-200 hover:bg-red-50 hover:text-red-600 text-slate-500 px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                        Logout
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <div class="lg:col-span-7 space-y-8">
                    
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 overflow-hidden border border-slate-100">
                        <div class="bg-[#EFF6FF] px-8 py-5 flex justify-between items-center border-b border-blue-100">
                            <span class="text-blue-800 font-bold flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                Upcoming Exam
                            </span>
                            <span class="bg-white text-blue-600 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">Starts in 45m ></span>
                        </div>
                        <div class="p-8">
                            <h2 class="text-2xl font-black text-slate-800 mb-4">Math Final Exam</h2>
                            <div class="space-y-3 text-slate-600 text-sm font-medium mb-8">
                                <p class="flex items-center gap-2"><span>📅</span> Today at 1:00 PM</p>
                                <p class="flex items-center gap-2"><span>⏱</span> 75 minutes</p>
                                <p class="flex items-center gap-2"><span>📝</span> Questions: 50</p>
                            </div>
                            <button class="w-full bg-[#3B82F6] hover:bg-blue-600 text-white font-bold py-4 rounded-2xl transition-colors shadow-lg shadow-blue-500/30">
                                GO TO EXAM
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/40 border border-slate-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-slate-800">My Exams</h3>
                            <a href="#" class="text-sm font-bold text-slate-400 hover:text-blue-500">VIEW ALL</a>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                <div class="flex items-center gap-4">
                                    <div class="bg-blue-500 text-white p-3 rounded-xl"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg></div>
                                    <div>
                                        <h4 class="font-bold text-slate-800">Math Final Exam</h4>
                                        <p class="text-xs text-slate-500 font-medium">Today at 1:00 PM</p>
                                    </div>
                                </div>
                                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-lg">STARTS SOON ></span>
                            </div>
                            <div class="flex items-center justify-between p-4 rounded-2xl hover:bg-slate-50 transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="bg-indigo-100 text-indigo-500 p-3 rounded-xl"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg></div>
                                    <div>
                                        <h4 class="font-bold text-slate-800">Physics Midterm</h4>
                                        <p class="text-xs text-slate-500 font-medium">April 27, 2026 at 10:00 AM</p>
                                    </div>
                                </div>
                                <span class="text-slate-400 text-xs font-bold px-3 py-1">UPCOMING ></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 space-y-8">
                    
                    <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 overflow-hidden border border-slate-100">
                        <div class="bg-[#ECFDF5] px-6 py-4 flex justify-between items-center border-b border-emerald-100">
                            <span class="text-emerald-800 font-bold flex items-center gap-2">
                                📷 Proctoring Status
                            </span>
                            <span id="cam-indicator" class="bg-white text-emerald-600 text-xs font-bold px-3 py-1 rounded-full shadow-sm">Setup Required</span>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-emerald-600 font-black text-lg uppercase tracking-wide mb-2">AI MONITORING ACTIVE</h3>
                            <p class="text-slate-500 text-sm mb-6">Your identity and environment will be monitored during the exam.</p>
                            
                            <div class="relative aspect-video bg-slate-900 rounded-2xl overflow-hidden mb-6 shadow-inner">
                                <video id="webcam" autoplay playsinline muted class="w-full h-full object-cover opacity-80"></video>
                                
                                <div id="ai-warning" class="hidden absolute inset-0 bg-red-600/80 backdrop-blur-sm flex items-center justify-center z-50">
                                    <div class="text-center">
                                        <h2 class="text-xl font-black text-white uppercase tracking-widest">Identity Lost</h2>
                                        <p class="text-red-100 text-xs mt-1 font-bold">Please return to frame</p>
                                    </div>
                                </div>

                                <div id="ai-status" class="absolute bottom-3 left-3 bg-slate-800/80 backdrop-blur border border-slate-600 text-slate-300 text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-lg">
                                    AI: Waiting for stream...
                                </div>
                            </div>

                            <div class="flex gap-2 mb-6">
                                <button id="start-cam" class="flex-1 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl transition-colors shadow-lg shadow-emerald-500/30 text-sm">
                                    Start Camera Setup
                                </button>
                                <button id="stop-cam" class="hidden flex-1 bg-slate-200 hover:bg-red-500 hover:text-white text-slate-600 font-bold py-3 rounded-xl transition-colors text-sm">
                                    Disconnect
                                </button>
                            </div>

                            <ul class="space-y-2 text-sm font-medium text-slate-600">
                                <li class="flex items-center gap-2"><span class="text-emerald-500">✔</span> Face Detection Active</li>
                                <li class="flex items-center gap-2"><span class="text-emerald-500">✔</span> Tab Monitoring Active</li>
                                <li class="flex items-center gap-2"><span class="text-emerald-500">✔</span> Noise Detection Active</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] p-8 shadow-xl shadow-slate-200/40 border border-slate-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-bold text-slate-800">Exam Guidelines</h3>
                        </div>
                        <ul class="space-y-4 text-sm font-medium text-slate-600">
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 mt-0.5">✔</span> 
                                Your webcam and microphone are required during the exam.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 mt-0.5">✔</span> 
                                Do not switch browser tabs during the exam.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 mt-0.5">✔</span> 
                                Ensure you are in a quiet environment with sufficient lighting.
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-emerald-500 mt-0.5">✔</span> 
                                Violation of rules may result in disqualification.
                            </li>
                        </ul>
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

        // Load AI Models
        async function loadModels() {
            try {
                statusText.innerText = "AI: Loading Models...";
                const MODEL_URL = 'https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights';
                await faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL);
                statusText.innerText = "AI: System Ready";
            } catch (err) {
                statusText.innerText = "AI: Model Error";
                console.error(err);
            }
        }

        // Send Violation to Database
        async function logViolation(type) {
            const now = Date.now();
            if (now - lastViolationTime < 10000) return; // Prevent spamming
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
            } catch (err) {
                console.error("Logging failed.", err);
            }
        }

        // Start Stream
        async function startAegis() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
                video.classList.replace('opacity-80', 'opacity-100');
                
                camIndicator.innerText = "Monitoring...";
                camIndicator.classList.replace('text-emerald-600', 'text-white');
                camIndicator.classList.replace('bg-white', 'bg-emerald-500');
                camIndicator.classList.add('animate-pulse');
                
                startBtn.classList.add('hidden');
                stopBtn.classList.remove('hidden');

                video.onplay = () => {
                    detectionInterval = setInterval(async () => {
                        if (!stream) return;
                        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions());

                        if (detections.length === 0) {
                            warningOverlay.classList.remove('hidden');
                            statusText.innerText = "AI: Subject Missing!";
                            statusText.classList.replace('text-emerald-400', 'text-red-400');
                            logViolation('FACE_MISSING'); 
                        } else {
                            warningOverlay.classList.add('hidden');
                            statusText.innerText = "AI: Face Locked";
                            statusText.classList.replace('text-slate-300', 'text-emerald-400');
                            statusText.classList.replace('text-red-400', 'text-emerald-400');
                        }
                    }, 500);
                };
            } catch (err) {
                statusText.innerText = "AI: Camera Blocked";
            }
        }

        // Stop Stream
        function stopAegis() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                video.srcObject = null;
                stream = null;
                video.classList.replace('opacity-100', 'opacity-80');
                clearInterval(detectionInterval);
                
                warningOverlay.classList.add('hidden');
                camIndicator.innerText = "Setup Required";
                camIndicator.classList.replace('text-white', 'text-emerald-600');
                camIndicator.classList.replace('bg-emerald-500', 'bg-white');
                camIndicator.classList.remove('animate-pulse');
                
                startBtn.classList.remove('hidden');
                stopBtn.classList.add('hidden');
                statusText.innerText = "AI: Stream Ended";
            }
        }

        startBtn.addEventListener('click', startAegis);
        stopBtn.addEventListener('click', stopAegis);

        loadModels();
    </script>
</x-app-layout>