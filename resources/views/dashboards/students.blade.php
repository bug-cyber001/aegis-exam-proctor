<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AegisExam - Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-item:hover { background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
        .sidebar-item.active { background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, transparent 100%); border-left: 3px solid #3b82f6; }
    </style>
</head>
<body class="bg-slate-50" x-data="studentManager()">

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
                {{-- STUDENTS IS NOW ACTIVE --}}
                <a href="{{ route('teacher.students') }}" class="sidebar-item active flex items-center gap-3 px-6 py-3 text-sm font-bold text-white transition-all border-l-3 border-transparent">
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
        <main class="flex-1 overflow-y-auto pb-20">
            
            {{-- Top Header --}}
            <header class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center sticky top-0 z-40">
                <div class="flex items-center gap-8">
                    <div class="flex gap-6">
                        <button class="text-sm font-bold text-slate-800 border-b-2 border-blue-600 pb-4 -mb-4">Student Roster</button>
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

            {{-- The Core Student Management Code You Built --}}
            <div class="p-8 max-w-7xl mx-auto">
                
                {{-- Header --}}
                <header class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 gap-4">
                    <div>
                        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Student Management</h1>
                        <p class="text-sm font-bold text-slate-400 mt-1">Manage students, track progress, monitor integrity</p>
                    </div>

                    <div class="flex gap-3">
                        <button @click="openImportModal = true" 
                                class="bg-white border border-slate-200 hover:border-blue-300 hover:bg-blue-50 text-slate-600 hover:text-blue-600 px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all flex items-center gap-2 shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            Import CSV
                        </button>
                        <button @click="openAddModal = true" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 transition-all shadow-lg shadow-blue-500/30 hover:shadow-xl">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Student
                        </button>
                    </div>
                </header>

                {{-- Stats Overview --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest mb-1">Total Students</p>
                        <h3 class="text-3xl font-black text-slate-800" x-text="students.length">0</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-emerald-500 text-[10px] font-black uppercase tracking-widest mb-1">Active</p>
                        <h3 class="text-3xl font-black text-emerald-600" x-text="students.filter(s => s.status === 'active').length">0</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-red-500 text-[10px] font-black uppercase tracking-widest mb-1">High Risk</p>
                        <h3 class="text-3xl font-black text-red-600" x-text="students.filter(s => s.riskLevel === 'high').length">0</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100">
                        <p class="text-amber-500 text-[10px] font-black uppercase tracking-widest mb-1">Exams Today</p>
                        <h3 class="text-3xl font-black text-amber-600">{{ $examsToday }}</h3>
                    </div>
                </div> 

                {{-- Filters & Search --}}
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 mb-6">
                    <div class="flex flex-col lg:flex-row gap-4">
                        {{-- Search --}}
                        <div class="flex-1 relative">
                            <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" 
                                   x-model="searchQuery" 
                                   placeholder="Search by name, ID, or email..." 
                                   class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        </div>

                        {{-- Filters --}}
                        <div class="flex gap-3 flex-wrap">
                            <select x-model="filterClass" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-slate-600 focus:ring-2 focus:ring-blue-500">
                                <option value="">All Classes</option>
                                <option value="10A">Class 10A</option>
                                <option value="10B">Class 10B</option>
                                <option value="11A">Class 11A</option>
                                <option value="11B">Class 11B</option>
                            </select>

                            <select x-model="filterRisk" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-slate-600 focus:ring-2 focus:ring-blue-500">
                                <option value="">All Risk Levels</option>
                                <option value="low">Low Risk</option>
                                <option value="medium">Medium Risk</option>
                                <option value="high">High Risk</option>
                            </select>

                            <select x-model="filterStatus" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-slate-600 focus:ring-2 focus:ring-blue-500">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Students Table --}}
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-50 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50 border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Student</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Class/Section</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Exams</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Risk Level</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <template x-for="student in filteredStudents" :key="student.id">
                                    <tr class="hover:bg-slate-50/80 transition-colors group">
                                        {{-- Student Info --}}
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-4">
                                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center text-white font-black text-lg shadow-lg shadow-blue-200" x-text="student.initials"></div>
                                                <div>
                                                    <p class="text-sm font-black text-slate-800" x-text="student.name"></p>
                                                    <p class="text-xs text-slate-400 font-bold" x-text="student.email"></p>
                                                    <p class="text-[10px] text-slate-300 font-mono mt-0.5" x-text="'ID: ' + student.studentId"></p>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Class --}}
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 px-3 py-1.5 rounded-lg text-xs font-bold border border-indigo-100">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                <span x-text="student.class"></span>
                                            </span>
                                        </td>

                                        {{-- Exams Count --}}
                                        <td class="px-6 py-4 text-center">
                                            <div class="inline-flex flex-col items-center">
                                                <span class="text-lg font-black text-slate-800" x-text="student.totalExams"></span>
                                                <span class="text-[10px] text-slate-400 font-bold uppercase" x-text="student.avgScore + '% avg'"></span>
                                            </div>
                                        </td>

                                        {{-- Risk Level --}}
                                        <td class="px-6 py-4 text-center">
                                            <span :class="{
                                                'bg-emerald-100 text-emerald-700 border-emerald-200': student.riskLevel === 'low',
                                                'bg-amber-100 text-amber-700 border-amber-200': student.riskLevel === 'medium',
                                                'bg-red-100 text-red-700 border-red-200': student.riskLevel === 'high'
                                            }" class="px-3 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wider border">
                                                <span x-text="student.riskLevel"></span>
                                            </span>
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4 text-center">
                                            <span :class="{
                                                'bg-emerald-100 text-emerald-700': student.status === 'active',
                                                'bg-slate-100 text-slate-600': student.status === 'inactive',
                                                'bg-red-100 text-red-700': student.status === 'suspended'
                                            }" class="px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest" x-text="student.status"></span>
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button @click="viewProfile(student)" 
                                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-colors" 
                                                        title="View Profile">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </button>
                                                <button @click="editStudent(student)" 
                                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-xl transition-colors" 
                                                        title="Edit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button @click="confirmDelete(student)" 
                                                        class="p-2 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-colors" 
                                                        title="Delete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    {{-- Empty State --}}
                    <div x-show="filteredStudents.length === 0" class="text-center py-16" style="display: none;">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-50 text-slate-300 mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-slate-800 font-black text-xl mb-2">No students found</h3>
                        <p class="text-slate-400 text-sm">Try adjusting your search or filters</p>
                    </div>

                    {{-- Pagination --}}
                    <div class="px-6 py-4 border-t border-slate-100 flex justify-between items-center">
                        <p class="text-xs text-slate-400 font-bold">Showing <span x-text="filteredStudents.length"></span> students</p>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 rounded-lg border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50" disabled>Previous</button>
                            <button class="px-4 py-2 rounded-lg bg-blue-600 text-white text-xs font-bold hover:bg-blue-700 transition-colors">Next</button>
                        </div>
                    </div>
                </div>

                {{-- Add/Edit Student Modal --}}
                <div x-show="openAddModal || openEditModal" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm"
                     style="display: none;">
                    
                    <div @click.away="closeModals()" 
                         class="bg-white rounded-[2rem] p-8 w-full max-w-2xl shadow-2xl border border-slate-100 mx-4 max-h-[90vh] overflow-y-auto">
                        
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-black text-slate-800" x-text="editingStudent ? 'Edit Student' : 'Add New Student'"></h3>
                            <button @click="closeModals()" class="text-slate-400 hover:text-red-500 transition-colors p-1 rounded-lg hover:bg-red-50">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <form @submit.prevent="saveStudent()">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Full Name</label>
                                    <input type="text" x-model="form.name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Student ID</label>
                                    <input type="text" x-model="form.studentId" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Email</label>
                                    <input type="email" x-model="form.email" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Class/Section</label>
                                    <select x-model="form.class" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                        <option value="10A">Class 10A</option>
                                        <option value="10B">Class 10B</option>
                                        <option value="11A">Class 11A</option>
                                        <option value="11B">Class 11B</option>
                                        <option value="12A">Class 12A</option>
                                        <option value="12B">Class 12B</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Status</label>
                                    <select x-model="form.status" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="suspended">Suspended</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Risk Level</label>
                                    <select x-model="form.riskLevel" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex gap-3 justify-end">
                                <button type="button" @click="closeModals()" class="px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-colors">Cancel</button>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-colors shadow-lg shadow-blue-500/30">
                                    <span x-text="editingStudent ? 'Update Student' : 'Add Student'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Student Profile Modal --}}
                <div x-show="openProfileModal" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm"
                     style="display: none;">
                    
                    <div @click.away="openProfileModal = false" 
                         class="bg-white rounded-[2rem] w-full max-w-4xl shadow-2xl border border-slate-100 mx-4 max-h-[90vh] overflow-hidden flex flex-col">
                        
                        {{-- Profile Header --}}
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                            <div class="relative z-10 flex justify-between items-start">
                                <div class="flex items-center gap-6">
                                    <div class="w-20 h-20 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-3xl font-black border-4 border-white/30" x-text="selectedStudent?.initials"></div>
                                    <div>
                                        <h3 class="text-3xl font-black mb-1" x-text="selectedStudent?.name"></h3>
                                        <p class="text-blue-100 font-bold" x-text="selectedStudent?.email"></p>
                                        <div class="flex gap-3 mt-3">
                                            <span class="bg-white/20 backdrop-blur px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider" x-text="selectedStudent?.studentId"></span>
                                            <span class="bg-white/20 backdrop-blur px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider" x-text="selectedStudent?.class"></span>
                                            <span :class="{
                                                'bg-emerald-400/30 text-emerald-100': selectedStudent?.riskLevel === 'low',
                                                'bg-amber-400/30 text-amber-100': selectedStudent?.riskLevel === 'medium',
                                                'bg-red-400/30 text-red-100': selectedStudent?.riskLevel === 'high'
                                            }" class="px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider" x-text="selectedStudent?.riskLevel + ' risk'"></span>
                                        </div>
                                    </div>
                                </div>
                                <button @click="openProfileModal = false" class="text-white/70 hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Profile Content --}}
                        <div class="p-8 overflow-y-auto">
                            {{-- Stats Grid --}}
                            <div class="grid grid-cols-3 gap-4 mb-8">
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 text-center">
                                    <p class="text-3xl font-black text-slate-800" x-text="selectedStudent?.totalExams"></p>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Total Exams</p>
                                </div>
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 text-center">
                                    <p class="text-3xl font-black text-emerald-600" x-text="selectedStudent?.avgScore + '%'"></p>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Average Score</p>
                                </div>
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 text-center">
                                    <p class="text-3xl font-black text-red-600" x-text="selectedStudent?.violations || 0"></p>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Violations</p>
                                </div>
                            </div>

                            {{-- Tabs --}}
                            <div class="border-b border-slate-200 mb-6">
                                <div class="flex gap-6">
                                    <button @click="activeTab = 'exams'" :class="{ 'text-blue-600 border-b-2 border-blue-600': activeTab === 'exams', 'text-slate-400 hover:text-slate-600': activeTab !== 'exams' }" class="pb-3 text-xs font-black uppercase tracking-widest transition-colors">Exam History</button>
                                    <button @click="activeTab = 'violations'" :class="{ 'text-blue-600 border-b-2 border-blue-600': activeTab === 'violations', 'text-slate-400 hover:text-slate-600': activeTab !== 'violations' }" class="pb-3 text-xs font-black uppercase tracking-widest transition-colors">Violations</button>
                                    <button @click="activeTab = 'activity'" :class="{ 'text-blue-600 border-b-2 border-blue-600': activeTab === 'activity', 'text-slate-400 hover:text-slate-600': activeTab !== 'activity' }" class="pb-3 text-xs font-black uppercase tracking-widest transition-colors">Recent Activity</button>
                                </div>
                            </div>

                            {{-- Tab Content --}}
                            <div x-show="activeTab === 'exams'" class="space-y-3">
                                <template x-for="exam in selectedStudent?.examHistory || []" :key="exam.id">
                                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100 hover:border-blue-200 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800" x-text="exam.title"></p>
                                                <p class="text-xs text-slate-400" x-text="exam.date"></p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <span class="text-sm font-black text-slate-600" x-text="exam.score + '/' + exam.total"></span>
                                            <span :class="{
                                                'bg-emerald-100 text-emerald-700': exam.status === 'completed',
                                                'bg-amber-100 text-amber-700': exam.status === 'pending'
                                            }" class="px-3 py-1 rounded-full text-[10px] font-black uppercase" x-text="exam.status"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <div x-show="activeTab === 'violations'" class="space-y-3" style="display: none;">
                                <template x-for="violation in selectedStudent?.violationHistory || []" :key="violation.id">
                                    <div class="flex items-center gap-4 p-4 bg-red-50 rounded-xl border border-red-100">
                                        <div class="bg-red-100 text-red-600 p-2 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-bold text-red-800" x-text="violation.type"></p>
                                            <p class="text-xs text-red-600" x-text="violation.description"></p>
                                        </div>
                                        <span class="text-xs font-bold text-red-400" x-text="violation.date"></span>
                                    </div>
                                </template>
                                <div x-show="!selectedStudent?.violationHistory?.length" class="text-center py-8 text-slate-400">
                                    <p class="text-sm font-bold">No violations recorded</p>
                                </div>
                            </div>

                            <div x-show="activeTab === 'activity'" style="display: none;">
                                <div class="space-y-3">
                                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl">
                                        <div class="bg-blue-100 text-blue-600 p-2 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-bold text-slate-800">Logged in</p>
                                            <p class="text-xs text-slate-400">Today, 9:30 AM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Delete Confirmation Modal --}}
                <div x-show="openDeleteModal" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm"
                     style="display: none;">
                    
                    <div class="bg-white rounded-[2rem] p-8 w-full max-w-md shadow-2xl border border-slate-100 mx-4 text-center">
                        <div class="w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-800 mb-2">Delete Student?</h3>
                        <p class="text-slate-500 mb-6">Are you sure you want to delete <span x-text="studentToDelete?.name" class="font-bold text-slate-800"></span>? This action cannot be undone.</p>
                        
                        <div class="flex gap-3 justify-center">
                            <button @click="openDeleteModal = false" class="px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-colors">Cancel</button>
                            <button @click="deleteStudent()" class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-colors shadow-lg shadow-red-500/30">Delete Student</button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        function studentManager() {
            return {
                profileOpen: false, // Added to control the top-right profile dropdown
                openAddModal: false,
                openEditModal: false,
                openProfileModal: false,
                openDeleteModal: false,
                openImportModal: false,
                editingStudent: null,
                selectedStudent: null,
                studentToDelete: null,
                activeTab: 'exams',
                searchQuery: '',
                filterClass: '',
                filterRisk: '',
                filterStatus: '',
                
                form: {
                    name: '',
                    studentId: '',
                    email: '',
                    class: '10A',
                    status: 'active',
                    riskLevel: 'low'
                },

                // DYNAMIC DATABASE DATA INJECTION
                students: @json($students).map(student => ({
                    id: student.id,
                    name: student.name,
                    initials: student.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase(),
                    email: student.email,
                    studentId: student.student_id || 'N/A',
                    class: student.class_section || 'Unassigned',
                    status: 'active', // Assuming all are active for now
                    riskLevel: student.risk_level ? student.risk_level.toLowerCase() : 'low',
                    totalExams: student.exams_count || 0,
                    avgScore: '--', // Placeholder until grading engine is built
                    violations: student.violations_count || 0,
                    examHistory: [], // Placeholder for modal
                    violationHistory: [] // Placeholder for modal
                })),

                get filteredStudents() {
                    return this.students.filter(student => {
                        const matchesSearch = !this.searchQuery || 
                            student.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            student.studentId.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            student.email.toLowerCase().includes(this.searchQuery.toLowerCase());
                        
                        const matchesClass = !this.filterClass || student.class === this.filterClass;
                        const matchesRisk = !this.filterRisk || student.riskLevel === this.filterRisk;
                        const matchesStatus = !this.filterStatus || student.status === this.filterStatus;
                        
                        return matchesSearch && matchesClass && matchesRisk && matchesStatus;
                    });
                },

                viewProfile(student) {
                    this.selectedStudent = student;
                    this.activeTab = 'exams';
                    this.openProfileModal = true;
                },

                editStudent(student) {
                    this.editingStudent = student;
                    this.form = { ...student };
                    this.openEditModal = true;
                },

                confirmDelete(student) {
                    this.studentToDelete = student;
                    this.openDeleteModal = true;
                },

                deleteStudent() {
                    if (this.studentToDelete) {
                        this.students = this.students.filter(s => s.id !== this.studentToDelete.id);
                        this.openDeleteModal = false;
                        this.studentToDelete = null;
                    }
                },

                saveStudent() {
                    if (this.editingStudent) {
                        const index = this.students.findIndex(s => s.id === this.editingStudent.id);
                        this.students[index] = { ...this.editingStudent, ...this.form };
                    } else {
                        const newStudent = {
                            id: Date.now(),
                            initials: this.form.name.split(' ').map(n => n[0]).join('').toUpperCase(),
                            totalExams: 0,
                            avgScore: 0,
                            violations: 0,
                            examHistory: [],
                            violationHistory: [],
                            ...this.form
                        };
                        this.students.push(newStudent);
                    }
                    this.closeModals();
                },

                closeModals() {
                    this.openAddModal = false;
                    this.openEditModal = false;
                    this.openProfileModal = false;
                    this.openDeleteModal = false;
                    this.editingStudent = null;
                    this.selectedStudent = null;
                    this.form = {
                        name: '',
                        studentId: '',
                        email: '',
                        class: '10A',
                        status: 'active',
                        riskLevel: 'low'
                    };
                }
            }
        }
    </script>
</body>
</html>