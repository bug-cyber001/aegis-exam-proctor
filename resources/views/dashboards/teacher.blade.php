<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-blue-100/50 border border-blue-50 flex justify-between items-center relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
                    <div class="relative">
                        <p class="text-blue-500 font-black text-[10px] uppercase tracking-widest mb-1">Live Exams</p>
                        <h3 class="text-5xl font-black text-slate-800">0</h3>
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
                        <h3 class="text-5xl font-black text-slate-800">0</h3>
                        <p class="text-slate-400 text-[10px] mt-1 font-bold">FLAGS TODAY</p>
                    </div>
                    <div class="bg-gradient-to-br from-red-400 to-rose-600 p-4 rounded-2xl shadow-lg shadow-red-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl shadow-sm mb-8 flex gap-4 overflow-x-auto">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-xl font-bold flex items-center gap-2">
                    <span>+</span> CREATE EXAM
                </button>
                <button class="bg-indigo-50 text-indigo-700 px-6 py-2 rounded-xl font-bold border border-indigo-100">
                    VIEW REPORTS
                </button>
            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-50 min-h-[400px]">
    <div class="flex justify-between items-center mb-8">
        <h4 class="font-black text-slate-800 tracking-tight">Recent Activity</h4>
        <button class="text-slate-400 hover:text-slate-600">⚙</button>
    </div>

    <div class="space-y-6">
        @forelse($recentActivity as $activity)
            <div class="flex items-center justify-between group cursor-default">
                <div class="flex items-center gap-4">
                    <div class="{{ $activity->type == 'FACE_MISSING' ? 'bg-red-50 text-red-500' : 'bg-blue-50 text-blue-500' }} p-3 rounded-2xl transition-transform group-hover:scale-110">
                        @if($activity->type == 'FACE_MISSING')
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        @endif
                    </div>
                    
                    <div>
                        <p class="text-sm font-black text-slate-700">
                            {{ $activity->user->name }} flagged
                        </p>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                            ({{ str_replace('_', ' ', $activity->type) }})
                        </p>
                    </div>
                </div>
                <span class="text-[10px] font-black text-slate-400">
                    {{ $activity->created_at->diffForHumans() }}
                </span>
            </div>
        @empty
            <div class="text-center py-10">
                <p class="text-slate-400 text-sm italic font-medium">No recent violations detected.</p>
            </div>
        @endforelse
    </div>

    <div class="flex justify-center gap-1.5 mt-10">
        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
        <span class="w-1.5 h-1.5 rounded-full bg-slate-200"></span>
        <span class="w-1.5 h-1.5 rounded-full bg-slate-200"></span>
    </div>
</div>

                <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-100/50 border border-slate-50">
    <div class="flex justify-between items-center mb-6">
        <h4 class="font-black text-slate-800 tracking-tight">Activity Overview</h4>
        <div class="flex gap-4 text-[10px] font-bold uppercase tracking-widest">
            <span class="flex items-center gap-1 text-blue-500">● Exams</span>
            <span class="flex items-center gap-1 text-red-400">● Suspicious</span>
        </div>
    </div>
    
    <div class="relative h-[250px] w-full">
        <canvas id="activityChart"></canvas>
    </div>
</div>
            </div>

        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('activityChart').getContext('2d');
        
        // Create a Gradient for the "Fill" under the line
        const gradient = ctx.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.4)'); // Blue
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');  // Transparent

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon'],
                datasets: [{
                    label: 'Exams Today',
                    data: [12, 19, 15, 25, 22, 30, 45], // Fake data to match the trend
                    borderColor: '#3b82f6',
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4, // This makes the line "curvy" (Bezier)
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false } // We made our own legend in HTML
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f8fafc' }, // Very light grid lines
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { weight: 'bold' }, color: '#94a3b8' }
                    }
                }
            }
        });
    });
</script>