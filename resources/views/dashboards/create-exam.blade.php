<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AegisExam - Create Exam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-item:hover { background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        .sidebar-item.active { background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        
        /* Custom Toggle Switch Styles */
        .toggle-checkbox:checked { right: 0; border-color: #2563EB; }
        .toggle-checkbox:checked + .toggle-label { background-color: #2563EB; }
        .toggle-checkbox { right: 4px; z-index: 1; border-color: #E2E8F0; transition: all 0.3s; }
        .toggle-label { width: 3rem; height: 1.5rem; background-color: #CBD5E1; border-radius: 9999px; transition: all 0.3s; }
    </style>
</head>
<body class="bg-slate-50">

    <div class="flex h-screen overflow-hidden">
        
        {{-- Dark Sidebar --}}
        <aside class="w-64 bg-slate-900 text-white flex flex-col flex-shrink-0">
            <div class="p-6 flex items-center gap-3 border-b border-slate-800">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <h1 class="font-black text-lg tracking-tight">AEGISEXAM</h1>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">AI Proctoring</p>
                </div>
            </div>

            <nav class="flex-1 py-6 space-y-1 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('teacher.students') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Students
                </a>
                <a href="{{ route('teacher.exams') }}" class="sidebar-item active flex items-center gap-3 px-6 py-3 text-sm font-bold text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Exams
                </a>
                <a href="{{ route('teacher.question-bank') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Question Bank
                </a>
                <a href="{{ route('teacher.reports') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Reports
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto pb-20">
            
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <a href="{{ route('teacher.exams') }}" class="p-2 text-slate-400 hover:text-blue-600 transition-colors bg-slate-50 hover:bg-blue-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <h2 class="text-sm font-bold text-slate-800">Exam Setup</h2>
                </div>
            </header>

            <div class="p-8 max-w-4xl mx-auto">
                
                <div class="mb-8">
                    <h1 class="text-3xl font-black text-slate-800 tracking-tight">Create New Exam</h1>
                    <p class="text-sm font-bold text-slate-400 mt-1">Configure settings, constraints, and security parameters.</p>
                </div>

                <form action="#" method="POST" class="space-y-8">
                    @csrf

                    {{-- Section 1: Basic Info --}}
                    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                        <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">1</span>
                            General Information
                        </h3>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Exam Title</label>
                                <input type="text" name="title" required placeholder="e.g., Midterm: Research Methodology" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                            
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Description / Instructions</label>
                                <textarea name="description" rows="3" placeholder="Provide instructions for the students..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Section 2: Scheduling & Scoring --}}
                    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                        <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">2</span>
                            Schedule & Passing Score
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Scheduled Date & Time</label>
                                <input type="datetime-local" name="start_time" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                            
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Duration (Minutes)</label>
                                <input type="number" name="duration" required min="5" max="300" placeholder="60" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Passing Score (%)</label>
                                <input type="number" name="passing_score" required min="1" max="100" placeholder="50" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 transition-all">
                            </div>
                        </div>
                    </div>

                    {{-- Section 3: Anti-Cheating Settings --}}
                    <div class="bg-slate-900 rounded-[2rem] shadow-xl shadow-slate-900/20 border border-slate-800 p-8 text-white">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <h3 class="text-lg font-black text-white mb-1 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    Security & AI Settings
                                </h3>
                                <p class="text-xs font-bold text-slate-400">Configure the parameters for the live monitoring system.</p>
                            </div>
                        </div>
                        
                        <div class="space-y-6">
                            {{-- Block Websites / Tab Switch --}}
                            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl border border-slate-700/50">
                                <div>
                                    <h4 class="font-bold text-sm text-white">Detect Tab Switching</h4>
                                    <p class="text-xs text-slate-400 mt-1">Flag student if they navigate away from the exam window.</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="detect_tabs" id="toggle1" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
                                    <label for="toggle1" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                            </div>

                            {{-- AI Face Detection --}}
                            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl border border-slate-700/50">
                                <div>
                                    <h4 class="font-bold text-sm text-white">AI Face Detection</h4>
                                    <p class="text-xs text-slate-400 mt-1">Require webcam. Detect missing faces or multiple people.</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="detect_face" id="toggle2" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" checked/>
                                    <label for="toggle2" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                            </div>

                            {{-- Auto-Submit on Violation --}}
                            <div class="flex items-center justify-between p-4 bg-red-900/20 rounded-xl border border-red-900/50">
                                <div>
                                    <h4 class="font-bold text-sm text-red-400">Auto-Submit on Severe Violation</h4>
                                    <p class="text-xs text-slate-400 mt-1">Automatically force-submit the exam if risk threshold is exceeded.</p>
                                </div>
                                <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                    <input type="checkbox" name="auto_submit" id="toggle3" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                    <label for="toggle3" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 border-t border-slate-200 pt-8">
                        <a href="{{ route('teacher.exams') }}" class="px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest text-slate-500 hover:bg-slate-100 transition-colors">Cancel</a>
                        
                        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-colors shadow-lg shadow-blue-500/30 flex items-center gap-2">
                            Save & Add Questions
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>

                </form>

            </div>
        </main>
    </div>

</body>
</html>