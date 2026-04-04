<x-app-layout>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Admin Overview</h2>
                    <p class="text-sm font-bold text-slate-400 mt-1">Aegis Exam Control Center</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white border border-slate-200 hover:border-red-200 hover:bg-red-50 hover:text-red-600 text-slate-500 px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Secure Logout
                    </button>
                </form>
            </div>

            @if($errors->any())
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition.duration.500ms class="mb-8 bg-red-50 border border-red-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-red-800 font-black text-lg mb-2">Something went wrong!</h3>
                    <ul class="text-red-600 text-sm font-bold list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition.duration.500ms class="mb-8 bg-emerald-50 border border-emerald-200 rounded-2xl p-6 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="bg-emerald-500 text-white p-3 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-emerald-800 font-black text-lg">{{ session('success') }}</h3>
                            <p class="text-emerald-600 text-sm font-bold">Copy this code and send it to your students so they can join the exam room.</p>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-blue-100/50 border border-blue-50 flex justify-between items-center relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
                    <div class="relative">
                        <p class="text-blue-500 font-black text-[10px] uppercase tracking-widest mb-1">Live Exams</p>
                        <h3 class="text-5xl font-black text-slate-800">{{ $liveExams }}</h3>
                        <p class="text-slate-400 text-[10px] mt-1 font-bold">ACTIVE SESSIONS</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-2xl shadow-lg shadow-blue-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-emerald-50 to-white p-6 rounded-[2rem] shadow-xl shadow-emerald-100/50 border border-emerald-100 relative">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-emerald-500 text-white p-2 rounded-xl shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <span class="bg-emerald-100 text-emerald-700 text-[10px] font-black px-2 py-1 rounded-full">ACTIVE</span>
                    </div>
                    <h3 class="text-emerald-900 font-black text-lg uppercase tracking-tight">System Ready</h3>
                    <div class="mt-3 space-y-2">
                        <div class="flex items-center text-xs text-emerald-700 font-bold"><span class="mr-2 text-emerald-500">✔</span> Face Detection</div>
                        <div class="flex items-center text-xs text-emerald-700 font-bold"><span class="mr-2 text-emerald-500">✔</span> Tab Monitoring</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-red-100/50 border border-red-50 flex justify-between items-center">
                    <div>
                        <p class="text-red-500 font-black text-[10px] uppercase tracking-widest mb-1">Suspicious Activity</p>
                        <h3 class="text-5xl font-black text-slate-800">{{ $flagsToday }}</h3>
                        <p class="text-slate-400 text-[10px] mt-1 font-bold">FLAGS TODAY</p>
                    </div>
                    <div class="bg-gradient-to-br from-red-400 to-rose-600 p-4 rounded-2xl shadow-lg shadow-red-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                </div>
            </div>

            <div x-data="{ showModal: false }" class="mb-8">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Quick Actions</h3>
                <div class="bg-white p-4 rounded-2xl shadow-sm flex gap-4 overflow-x-auto border border-slate-100">
                    <button @click="showModal = true" type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest flex items-center gap-2 transition-colors shadow-lg shadow-blue-500/30">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Create Exam
                    </button>
                    <a href="{{ route('teacher.reports') }}" class="bg-indigo-50 text-indigo-700 px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest border border-indigo-100 hover:bg-indigo-100 transition-colors inline-block">
                        View Reports
                    </a>
                </div>

                <div x-show="showModal" 
                    class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm transition-opacity"
                    style="display: none;">
                    
                    <div @click.away="showModal = false" class="bg-white rounded-[2rem] p-8 w-full max-w-md shadow-2xl border border-slate-100 transform transition-all">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-black text-slate-800">New Exam Room</h3>
                            <button @click="showModal = false" type="button" class="text-slate-400 hover:text-red-500 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>

                        <form action="{{ route('teacher.exam.store') }}" method="POST" x-data="{ scheduleLater: false }">
                            @csrf
                            <div class="space-y-4 mb-8">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Exam Title</label>
                                    <input type="text" name="title" required placeholder="e.g. Final Computer Science Exam" 
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Duration (Minutes)</label>
                                    <input type="number" name="duration" required min="5" max="300" placeholder="60" 
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                </div>

                                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 mt-4">
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="checkbox" name="is_scheduled" x-model="scheduleLater" class="w-5 h-5 rounded text-blue-600 focus:ring-blue-500 border-slate-300">
                                        <span class="text-sm font-bold text-slate-700">Schedule for a later time</span>
                                    </label>
                                    
                                    <div x-show="scheduleLater" x-transition class="mt-4 pt-4 border-t border-slate-200" style="display: none;">
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Start Date & Time</label>
                                        <input type="datetime-local" name="start_time" :required="scheduleLater"
                                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-xl transition-colors shadow-lg shadow-blue-500/30 uppercase tracking-widest text-xs">
                                Generate Access Code
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-50 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="font-black text-slate-800 tracking-tight">Active Exam Rooms</h4>
                    <span class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest">
                        {{ $liveExams }} Total
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100">
                                <th class="pb-3 text-[10px] font-black text-slate-400 uppercase tracking-widest">Exam Details</th>
                                <th class="pb-3 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Duration</th>
                                <th class="pb-3 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Access Code</th>
                                <th class="pb-3 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Created</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($createdExams as $exam)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    
                                    <td class="py-4 pr-4">
                                        <div class="flex items-center gap-3">
                                            <div class="bg-indigo-50 text-indigo-500 p-2.5 rounded-xl group-hover:scale-110 transition-transform">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            </div>
                                            <span class="text-sm font-bold text-slate-700">{{ $exam->title }}</span>
                                        </div>
                                    </td>

                                    <td class="py-4 px-4 text-center">
                                        <span class="text-xs font-bold text-slate-500">{{ $exam->duration }} mins</span>
                                    </td>

                                    <td class="py-4 px-4 text-center">
                                        <div class="inline-flex items-center gap-2 bg-slate-100 text-slate-700 px-3 py-1.5 rounded-lg border border-slate-200">
                                            <span class="text-sm font-black tracking-widest font-mono">{{ $exam->access_code }}</span>
                                        </div>
                                    </td>

                                    <td class="py-4 pl-4 text-right">
                                        <div class="flex items-center justify-end gap-4">
                                            
                                            @if($exam->status === 'active')
                                                <div class="inline-flex flex-col items-end">
                                                    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Live Now
                                                    </span>
                                                </div>
                                            @else
                                                <div class="inline-flex flex-col items-end">
                                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest flex items-center gap-1.5 mb-1">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        Scheduled
                                                    </span>
                                                    <span class="text-xs font-bold text-slate-500">
                                                        {{ $exam->start_time ? $exam->start_time->format('M d, g:i A') : 'Time TBD' }}
                                                    </span>
                                                </div>
                                            @endif

                                            <form action="{{ route('teacher.exam.destroy', $exam->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this exam? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all" title="Delete Exam">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center">
                                        <p class="text-slate-400 text-sm font-medium">You haven't created any exams yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-50 min-h-[400px]">
                <div class="flex justify-between items-center mb-8">
                    <h4 class="font-black text-slate-800 tracking-tight">Recent Activity</h4>
                    <a href="{{ route('teacher.reports') }}" class="text-xs font-bold text-blue-500 hover:text-blue-600 transition-colors uppercase tracking-widest">View All ></a>
                </div>

                <div class="space-y-6">
                    @forelse($recentActivity as $activity)
                        <div class="flex items-center justify-between group hover:bg-slate-50 p-2 -mx-2 rounded-xl transition-colors cursor-default">
                            <div class="flex items-center gap-4">
                                @if($activity->type == 'FACE_MISSING')
                                    <div class="bg-red-50 text-red-500 p-3 rounded-2xl group-hover:scale-110 transition-transform border border-red-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                    </div>
                                @elseif($activity->type == 'TAB_SWITCH')
                                    <div class="bg-orange-50 text-orange-500 p-3 rounded-2xl group-hover:scale-110 transition-transform border border-orange-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    </div>
                                @else
                                    <div class="bg-slate-100 text-slate-500 p-3 rounded-2xl group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                @endif
                                
                                <div>
                                    <p class="text-sm font-black text-slate-700">
                                        {{ $activity->user->name }} flagged
                                    </p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                        ({{ str_replace('_', ' ', $activity->type) }})
                                    </p>
                                </div>
                            </div>
                            
                            <span class="text-[10px] font-black text-slate-400 bg-slate-50 px-2 py-1 rounded-md">
                                {{ $activity->created_at->diffForHumans() }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-slate-800 font-black text-xl mb-1">All Clear</h3>
                            <p class="text-slate-400 text-sm font-medium">No recent violations detected today.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-50 mt-8 mb-12">
                <div class="flex justify-between items-center mb-6">
                    <h4 class="font-black text-slate-800 tracking-tight">Activity Overview (Last 7 Days)</h4>
                    <div class="flex gap-4">
                        <span class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-slate-400">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span> Exams
                        </span>
                        <span class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-slate-400">
                            <span class="w-2 h-2 rounded-full bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.5)] animate-pulse"></span> Suspicious
                        </span>
                    </div>
                </div>
                
                <div class="relative h-[300px] w-full">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('activityChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartDates) !!}, 
                datasets: [
                    {
                        label: 'Exams Created',
                        data: {!! json_encode($chartExams) !!}, 
                        borderColor: '#3b82f6', 
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 4,
                        tension: 0.4, 
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 3,
                        pointRadius: 4
                    },
                    {
                        label: 'Suspicious Activity',
                        data: {!! json_encode($chartFlags) !!}, 
                        borderColor: '#ef4444', 
                        backgroundColor: 'rgba(239, 68, 68, 0.05)',
                        borderWidth: 4,
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 3,
                        pointRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }, 
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: '#0f172a',
                        titleFont: { size: 13, family: 'sans-serif' },
                        bodyFont: { size: 13, family: 'sans-serif', weight: 'bold' },
                        padding: 12,
                        cornerRadius: 12
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1, precision: 0, color: '#94a3b8', font: { weight: 'bold' } },
                        border: { display: false },
                        grid: { color: '#f1f5f9' }
                    },
                    x: {
                        ticks: { color: '#94a3b8', font: { weight: 'bold' } },
                        border: { display: false },
                        grid: { display: false }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                }
            }
        });
    });
</script>