<x-app-layout>
    <div class="py-12 bg-[#F8FAFC] min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-end mb-8">
                <div>
                    <a href="{{ route('dashboard') }}" class="text-xs font-black text-blue-500 hover:text-blue-600 mb-3 flex items-center gap-1 uppercase tracking-widest transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Dashboard
                    </a>
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight">Security Reports</h2>
                    <p class="text-sm font-bold text-slate-400 mt-1">Aegis Exam Violation Logs</p>
                </div>
                
                <div class="flex gap-2">
                    <button class="bg-white border border-slate-200 text-slate-600 px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm hover:bg-slate-50">
                        Export CSV
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/40 overflow-hidden border border-slate-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Student Details</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Infraction Type</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Time Detected</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($violations as $violation)
                                <tr class="hover:bg-slate-50/50 transition-colors group">
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-bold text-sm">
                                                {{ substr($violation->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-800">{{ $violation->user->name }}</p>
                                                <p class="text-xs text-slate-400 font-medium">{{ $violation->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        @if($violation->type === 'FACE_MISSING')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-red-50 text-red-600 text-xs font-bold border border-red-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                                Face Missing
                                            </span>
                                        @elseif($violation->type === 'TAB_SWITCH')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-orange-50 text-orange-600 text-xs font-bold border border-orange-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                                                Tab Switch
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-bold border border-slate-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                                {{ str_replace('_', ' ', $violation->type) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-5">
                                        <p class="text-sm font-bold text-slate-700">{{ $violation->created_at->format('M d, Y') }}</p>
                                        <p class="text-xs text-slate-400 font-medium">{{ $violation->created_at->format('h:i:s A') }}</p>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="text-xs font-bold text-blue-500 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-lg transition-colors">
                                            Review Status
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-16 text-center">
                                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 mb-4">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <h3 class="text-slate-800 font-black text-xl mb-1">Clean Record</h3>
                                        <p class="text-slate-500 text-sm font-medium">No violations have been recorded by the Aegis system yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($violations->hasPages())
                    <div class="px-8 py-5 border-t border-slate-100 bg-slate-50">
                        {{ $violations->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>