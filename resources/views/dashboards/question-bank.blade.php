<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AegisExam - Question Bank</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-item:hover { background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        .sidebar-item.active { background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
    </style>
</head>
<body class="bg-slate-50" x-data="questionManager()">

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
                {{-- QUESTION BANK IS NOW ACTIVE --}}
                <a href="{{ route('teacher.question-bank') }}" class="sidebar-item active flex items-center gap-3 px-6 py-3 text-sm font-bold text-white transition-all border-l-3 border-transparent">
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
                <div class="flex items-center gap-8">
                    <div class="flex gap-6">
                        <button class="text-sm font-bold text-slate-800 border-b-2 border-blue-600 pb-4 -mb-4">Repository</button>
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
                
                {{-- Page Header & Actions --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Question Bank</h1>
                        <p class="text-sm font-bold text-slate-400 mt-1">Build and manage your master repository of exam questions</p>
                    </div>
                    
                    <div class="flex gap-3">
                        <button class="bg-white border border-slate-200 hover:border-blue-300 hover:bg-blue-50 text-slate-600 hover:text-blue-600 px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all flex items-center gap-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            Import CSV
                        </button>
                        <button @click="openAddModal = true" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 transition-all shadow-lg shadow-blue-500/30 hover:shadow-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Add Question
                        </button>
                    </div>
                </div>

                {{-- Stats Overview --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-1">Total Questions</p>
                        <h3 class="text-3xl font-black text-slate-800" x-text="questions.length">0</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-purple-500 text-[10px] font-black uppercase tracking-widest mb-1">Multiple Choice</p>
                        <h3 class="text-3xl font-black text-purple-600" x-text="questions.filter(q => q.type === 'mcq').length">0</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-amber-500 text-[10px] font-black uppercase tracking-widest mb-1">True / False</p>
                        <h3 class="text-3xl font-black text-amber-600" x-text="questions.filter(q => q.type === 'tf').length">0</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-emerald-500 text-[10px] font-black uppercase tracking-widest mb-1">Essay</p>
                        <h3 class="text-3xl font-black text-emerald-600" x-text="questions.filter(q => q.type === 'essay').length">0</h3>
                    </div>
                </div>

                {{-- Search & Filter --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 mb-6 flex flex-col lg:flex-row gap-4">
                    <div class="flex-1 relative">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input type="text" x-model="searchQuery" placeholder="Search questions or topics..." class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>
                    <div class="flex gap-3">
                        <select x-model="filterType" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-600 focus:ring-2 focus:ring-blue-500">
                            <option value="">All Types</option>
                            <option value="mcq">Multiple Choice</option>
                            <option value="tf">True / False</option>
                            <option value="essay">Essay</option>
                        </select>
                        <select x-model="filterDifficulty" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-600 focus:ring-2 focus:ring-blue-500">
                            <option value="">All Difficulties</option>
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </div>
                </div>

                {{-- Questions List --}}
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50 border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest w-1/2">Question</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Type & Topic</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Difficulty</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Points</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <template x-for="q in filteredQuestions" :key="q.id">
                                    <tr class="hover:bg-slate-50/80 transition-colors group">
                                        
                                        {{-- Question Text --}}
                                        <td class="px-6 py-4">
                                            <p class="text-sm font-bold text-slate-800 line-clamp-2" x-text="q.text"></p>
                                        </td>

                                        {{-- Type & Topic --}}
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col items-start gap-1">
                                                <span x-show="q.type === 'mcq'" class="bg-purple-50 text-purple-700 border border-purple-100 px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider">Multiple Choice</span>
                                                <span x-show="q.type === 'tf'" class="bg-amber-50 text-amber-700 border border-amber-100 px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider">True / False</span>
                                                <span x-show="q.type === 'essay'" class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider">Essay</span>
                                                
                                                <span class="text-xs text-slate-400 font-bold" x-text="q.topic"></span>
                                            </div>
                                        </td>

                                        {{-- Difficulty --}}
                                        <td class="px-6 py-4 text-center">
                                            <span :class="{
                                                'text-emerald-500': q.difficulty === 'easy',
                                                'text-amber-500': q.difficulty === 'medium',
                                                'text-red-500': q.difficulty === 'hard'
                                            }" class="text-[10px] font-black uppercase tracking-widest flex items-center justify-center gap-1">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span x-text="q.difficulty"></span>
                                            </span>
                                        </td>

                                        {{-- Points --}}
                                        <td class="px-6 py-4 text-center">
                                            <span class="text-sm font-black text-slate-700" x-text="q.points"></span>
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-xl transition-colors" title="Edit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </button>
                                                <button class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-colors" title="Delete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        
                        <div x-show="filteredQuestions.length === 0" class="text-center py-16" style="display: none;">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 text-slate-300 mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-slate-800 font-black text-lg mb-1">No questions found</h3>
                            <p class="text-slate-400 text-sm">Adjust your filters or add a new question.</p>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        {{-- Add Question Modal --}}
        <div x-show="openAddModal" 
             style="display: none;"
             class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm overflow-y-auto py-10">
            <div @click.away="openAddModal = false" class="bg-white rounded-[2rem] p-8 w-full max-w-2xl shadow-2xl mx-4 my-auto">
                <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
                    <h3 class="text-2xl font-black text-slate-800">Add New Question</h3>
                    <button @click="openAddModal = false" class="text-slate-400 hover:text-red-500 transition-colors p-1"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>

                <form @submit.prevent="openAddModal = false" class="space-y-6">
                    
                    {{-- Row 1: Type, Difficulty, Points --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Question Type</label>
                            <select x-model="form.type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                <option value="mcq">Multiple Choice</option>
                                <option value="tf">True / False</option>
                                <option value="essay">Essay</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Difficulty</label>
                            <select x-model="form.difficulty" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Points</label>
                            <input type="number" x-model="form.points" min="1" max="100" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    {{-- Row 2: Topic --}}
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Topic / Category</label>
                        <input type="text" x-model="form.topic" placeholder="e.g. Algorithms, History, Biology..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                    </div>

                    {{-- Row 3: Question Text --}}
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Question Text</label>
                        <textarea x-model="form.text" rows="4" required placeholder="Type the question here..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    {{-- Dynamic Section: MCQ Options --}}
                    <div x-show="form.type === 'mcq'" class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-3" style="display: none;">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest">Answer Options (Select Correct Answer)</label>
                        
                        <div class="flex items-center gap-3">
                            <input type="radio" name="mcq_answer" value="a" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <input type="text" placeholder="Option A" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-medium focus:border-blue-500 outline-none">
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="radio" name="mcq_answer" value="b" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <input type="text" placeholder="Option B" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-medium focus:border-blue-500 outline-none">
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="radio" name="mcq_answer" value="c" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <input type="text" placeholder="Option C" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-medium focus:border-blue-500 outline-none">
                        </div>
                        <div class="flex items-center gap-3">
                            <input type="radio" name="mcq_answer" value="d" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            <input type="text" placeholder="Option D" class="w-full bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-medium focus:border-blue-500 outline-none">
                        </div>
                    </div>

                    {{-- Dynamic Section: True/False Options --}}
                    <div x-show="form.type === 'tf'" class="bg-slate-50 p-4 rounded-xl border border-slate-200" style="display: none;">
                        <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-3">Correct Answer</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 cursor-pointer bg-white px-4 py-2 border border-slate-200 rounded-lg flex-1 hover:border-blue-300">
                                <input type="radio" name="tf_answer" value="true" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm font-bold text-slate-700">True</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer bg-white px-4 py-2 border border-slate-200 rounded-lg flex-1 hover:border-blue-300">
                                <input type="radio" name="tf_answer" value="false" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm font-bold text-slate-700">False</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" @click="openAddModal = false" class="px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest text-slate-500 hover:bg-slate-100 transition-colors">Cancel</button>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-colors shadow-lg shadow-blue-500/30">Save Question</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        function questionManager() {
            return {
                profileOpen: false,
                openAddModal: false,
                searchQuery: '',
                filterType: '',
                filterDifficulty: '',
                
                form: {
                    type: 'mcq',
                    difficulty: 'medium',
                    points: 10,
                    topic: '',
                    text: ''
                },
                
                // MOCK DATA: So you can see the UI working immediately
                questions: [
                    { id: 1, text: "What is the primary difference between a process and a thread?", type: "essay", topic: "Operating Systems", difficulty: "hard", points: 20 },
                    { id: 2, text: "In Laravel, Eloquent ORM provides a beautiful, simple ActiveRecord implementation for working with your database.", type: "tf", topic: "Web Frameworks", difficulty: "easy", points: 5 },
                    { id: 3, text: "Which HTTP method is typically used to completely replace an existing resource?", type: "mcq", topic: "API Design", difficulty: "medium", points: 10 },
                    { id: 4, text: "Explain the concept of 'Big O Notation' and provide examples of O(1), O(n), and O(n^2) algorithms.", type: "essay", topic: "Algorithms", difficulty: "hard", points: 25 },
                    { id: 5, text: "A primary key in a database table can contain NULL values.", type: "tf", topic: "Databases", difficulty: "easy", points: 5 },
                ],

                get filteredQuestions() {
                    return this.questions.filter(q => {
                        const matchesSearch = !this.searchQuery || 
                            q.text.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            q.topic.toLowerCase().includes(this.searchQuery.toLowerCase());
                        
                        const matchesType = !this.filterType || q.type === this.filterType;
                        const matchesDiff = !this.filterDifficulty || q.difficulty === this.filterDifficulty;
                        
                        return matchesSearch && matchesType && matchesDiff;
                    });
                }
            }
        }
    </script>
</body>
</html>