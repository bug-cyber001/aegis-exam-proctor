<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AegisExam - Admin Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-effect { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
        .sidebar-item:hover { background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        .sidebar-item.active { background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1); }
        .pulse-ring { animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite; }
        @keyframes pulse-ring { 0% { transform: scale(0.8); opacity: 0.8; } 100% { transform: scale(2); opacity: 0; } }
        .status-dot { box-shadow: 0 0 0 2px white, 0 0 0 4px currentColor; }
    </style>
</head>
<body class="bg-slate-50" x-data="aegisDashboard()">

    <div class="flex h-screen overflow-hidden">
        
        {{-- Dark Sidebar --}}
        <aside class="w-64 bg-slate-900 text-white flex flex-col flex-shrink-0">
            {{-- Logo --}}
            <div class="p-6 flex items-center gap-3 border-b border-slate-800">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="font-black text-lg tracking-tight">AEGISEXAM</h1>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">AI Proctoring</p>
                </div>
            </div>

            {{-- Navigation with Live Laravel Routes --}}
            <nav class="flex-1 py-6 space-y-1 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="sidebar-item active flex items-center gap-3 px-6 py-3 text-sm font-bold text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('teacher.students') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Students
                </a>
                <a href="{{ route('teacher.exams') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
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
        <main class="flex-1 overflow-y-auto">
            {{-- Top Navigation --}}
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-40">
                <div class="flex items-center gap-8">
                    <div class="flex gap-6">
                        <button class="text-sm font-bold text-slate-800 border-b-2 border-blue-600 pb-4 -mb-4">Admin Overview</button>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 relative">
                    <div class="flex items-center gap-3 pl-4 border-l border-slate-200 cursor-pointer" @click="profileOpen = !profileOpen">
                        <span class="text-sm font-bold text-slate-600">{{ auth()->user()->name }}</span>
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-md">
                            {{ substr(auth()->user()->name, 0, 2) }}
                        </div>
                    </div>
                    
                    {{-- Logout Dropdown --}}
                    <div x-show="profileOpen" @click.away="profileOpen = false" style="display: none;" class="absolute right-0 top-12 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 font-bold hover:bg-red-50 transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-8 max-w-7xl mx-auto">
                
                <div class="mb-8">
                    <h1 class="text-3xl font-black text-slate-800 tracking-tight">Admin Overview</h1>
                    <p class="text-sm font-bold text-slate-400 mt-1">Aegis Exam Control Center</p>
                </div>

                {{-- Stats Cards (Dynamic) --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    {{-- Live Exams --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 card-hover flex justify-between items-center relative overflow-hidden">
                        <div>
                            <p class="text-blue-600 text-[10px] font-black uppercase tracking-widest mb-2">Live Exams</p>
                            <h3 class="text-5xl font-black text-slate-800 mb-1">{{ $liveExams }}</h3>
                            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Active Sessions</p>
                        </div>
                        <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                    </div>

                    {{-- System Ready --}}
                    <div class="bg-emerald-50 p-6 rounded-2xl shadow-sm border border-emerald-100 card-hover relative overflow-hidden">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-md">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <span class="bg-emerald-200 text-emerald-800 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider">Active</span>
                        </div>
                        <h3 class="text-lg font-black text-emerald-900 uppercase tracking-tight mb-3">System Ready</h3>
                        <div class="space-y-2">
                            <div class="flex items-center text-xs text-emerald-700 font-bold"><svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Face Detection</div>
                            <div class="flex items-center text-xs text-emerald-700 font-bold"><svg class="w-4 h-4 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tab Monitoring</div>
                        </div>
                    </div>

                    {{-- Suspicious Activity --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 card-hover flex justify-between items-center relative overflow-hidden">
                        <div>
                            <p class="text-red-500 text-[10px] font-black uppercase tracking-widest mb-2">Suspicious Activity</p>
                            <h3 class="text-5xl font-black text-slate-800 mb-1">{{ $flagsToday }}</h3>
                            <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Flags Today</p>
                        </div>
                        <div class="w-14 h-14 bg-red-500 rounded-2xl flex items-center justify-center shadow-lg shadow-red-200 relative">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <div class="absolute inset-0 bg-red-500 rounded-2xl pulse-ring opacity-20"></div>
                        </div>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 mb-8">
                    <h3 class="text-sm font-black text-slate-800 mb-4 uppercase tracking-wider">Quick Actions</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('teacher.students') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 transition-all shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Manage Students
                        </a>
                        <a href="{{ route('teacher.exam.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 transition-all shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Create Exam
                        </a>
                        <a href="{{ route('teacher.reports') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 transition-all border border-slate-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            View Reports
                        </a>
                    </div>
                </div>

                {{-- Main Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    
                    {{-- Student Management Preview (Static for now) --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="font-black text-slate-800 tracking-tight">Student Management</h3>
                            <a href="{{ route('teacher.students') }}" class="text-blue-600 hover:text-blue-700 text-xs font-bold uppercase tracking-widest">View All</a>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-50/50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Name</th>
                                        <th class="px-6 py-3 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</th>
                                        <th class="px-6 py-3 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Risk Level</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @forelse($previewStudents as $student)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white font-bold text-xs">
                                                        {{ substr($student->name, 0, 2) }}
                                                    </div>
                                                    <span class="text-sm font-bold text-slate-700">{{ $student->name }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-slate-500 font-medium">{{ $student->email }}</td>
                                            <td class="px-6 py-4">
                                                <span class="bg-{{ $student->risk_color }}-100 text-{{ $student->risk_color }}-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider">
                                                    {{ $student->risk_level }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-6 py-8 text-center text-sm font-bold text-slate-400">
                                                No students registered yet.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Upcoming Exams (Dynamic Database Loop) --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                        <div class="p-6 border-b border-slate-100">
                            <h3 class="font-black text-slate-800 tracking-tight">Active/Upcoming Exams</h3>
                        </div>
                        
                        <div class="divide-y divide-slate-50">
                            @forelse($createdExams->take(4) as $exam)
                                <div class="p-4 flex items-center gap-4 hover:bg-slate-50/50 transition-colors group cursor-pointer">
                                    <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-black">
                                        {{ substr($exam->title, 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-slate-800 mb-0.5">{{ $exam->title }}</h4>
                                        <p class="text-xs text-slate-400 font-medium">{{ $exam->duration }} mins | Access: {{ $exam->access_code }}</p>
                                    </div>
                                    <button class="bg-white border border-slate-200 text-slate-600 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider flex items-center gap-2 hover:bg-slate-50 transition-colors shadow-sm">
                                        {{ ucfirst($exam->status) }}
                                    </button>
                                </div>
                            @empty
                                <div class="p-8 text-center text-slate-400 font-bold text-sm">No exams created yet.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Bottom Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    {{-- Recent Reports (Dynamic Database Loop) --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden lg:col-span-2">
                        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="font-black text-slate-800 tracking-tight">Recent Security Reports</h3>
                            <a href="{{ route('teacher.reports') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 uppercase tracking-widest flex items-center gap-1 transition-colors">
                                View All
                            </a>
                        </div>
                        
                        <div class="divide-y divide-slate-50">
                            @forelse($recentActivity as $activity)
                                <div class="p-4 flex items-center gap-4 hover:bg-slate-50/50 transition-colors">
                                    <div class="w-10 h-10 {{ $activity->type == 'FACE_MISSING' ? 'bg-red-100 text-red-500' : 'bg-amber-100 text-amber-500' }} rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="font-bold text-slate-800 text-sm">{{ $activity->user->name }}</span>
                                            <span class="text-slate-300">|</span>
                                            <span class="text-{{ $activity->type == 'FACE_MISSING' ? 'red' : 'amber' }}-600 text-sm font-medium truncate">{{ str_replace('_', ' ', $activity->type) }}</span>
                                        </div>
                                    </div>
                                    <span class="text-xs font-bold text-slate-400 whitespace-nowrap">{{ $activity->created_at->diffForHumans() }}</span>
                                </div>
                            @empty
                                <div class="p-8 text-center text-slate-400 font-bold text-sm">No security violations recorded today.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        function aegisDashboard() {
            return {
                profileOpen: false
            }
        }
    </script>
</body>
</html>