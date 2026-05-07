<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AegisExam - Security Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-item:hover { background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        .sidebar-item.active { background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
    </style>
</head>
<body class="bg-slate-50" x-data="{ profileOpen: false }">

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
                <a href="{{ route('teacher.exams') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Exams
                </a>
                <a href="{{ route('teacher.question-bank') }}" class="sidebar-item flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-400 hover:text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Question Bank
                </a>
                {{-- REPORTS IS NOW ACTIVE --}}
                <a href="{{ route('teacher.reports') }}" class="sidebar-item active flex items-center gap-3 px-6 py-3 text-sm font-bold text-white transition-all border-l-3 border-transparent">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Reports
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto pb-20">
            
            {{-- Top Header --}}
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-40">
                <div class="flex items-center gap-8">
                    <div class="flex gap-6">
                        <button class="text-sm font-bold text-slate-800 border-b-2 border-blue-600 pb-4 -mb-4">Security Logs</button>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 relative">
                    <div class="flex items-center gap-3 pl-4 border-l border-slate-200 cursor-pointer" @click="profileOpen = !profileOpen">
                        <span class="text-sm font-bold text-slate-600">{{ auth()->user()->name }}</span>
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-md">
                            {{ substr(auth()->user()->name, 0, 2) }}
                        </div>
                    </div>
                    
                    <div x-show="profileOpen" @click.away="profileOpen = false" style="display: none;" class="absolute right-0 top-12 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 font-bold hover:bg-red-50 transition-colors">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-8 max-w-7xl mx-auto">

                {{-- Page Header --}}
                <div class="mb-8">
                    <h1 class="text-3xl font-black text-slate-800 tracking-tight">Security Reports</h1>
                    <p class="text-sm font-bold text-slate-400 mt-1">A complete log of all suspicious activity detected by the AI proctor.</p>
                </div>

                {{-- Data Table --}}
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-100">
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Date & Time</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Student</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Violation Type</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($violations as $violation)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-slate-800">{{ $violation->created_at->format('M d, Y') }}</p>
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $violation->created_at->format('g:i A') }}</p>
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-bold text-xs">
                                                    {{ substr($violation->user->name, 0, 2) }}
                                                </div>
                                                <span class="text-sm font-bold text-slate-700">{{ $violation->user->name }}</span>
                                            </div>
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            @if($violation->type == 'FACE_MISSING')
                                                <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest border border-red-100">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                    Face Missing
                                                </span>
                                            @elseif($violation->type == 'TAB_SWITCH')
                                                <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest border border-amber-100">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    Tab Switch
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest border border-slate-200">
                                                    {{ str_replace('_', ' ', $violation->type) }}
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 text-right">
                                            <span class="text-xs font-bold text-slate-400">Logged</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center">
                                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 text-slate-300 mb-4">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                            </div>
                                            <p class="text-slate-800 font-black text-lg">No violations recorded</p>
                                            <p class="text-slate-400 text-sm mt-1">The system has not detected any suspicious activity yet.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>