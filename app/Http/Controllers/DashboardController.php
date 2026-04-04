<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'teacher') {
            $recentActivity = \App\Models\Violation::with('user')->latest()->take(5)->get();
            $flagsToday = \App\Models\Violation::whereDate('created_at', today())->count();
            $liveExams = \App\Models\Exam::where('teacher_id', auth()->id())->count();

            // --- NEW TIMELINE GRAPH LOGIC ---
            $chartDates = [];
            $chartExams = [];
            $chartFlags = [];

            // Loop backwards through the last 7 days
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i);
                $chartDates[] = $date->format('M d'); // e.g., "Apr 04"
                
                // Count exams created on this specific day
                $chartExams[] = \App\Models\Exam::where('teacher_id', auth()->id())
                                    ->whereDate('created_at', $date)->count();
                                    
                // Count violations logged on this specific day
                $chartFlags[] = \App\Models\Violation::whereDate('created_at', $date)->count();
            }

            // FETCH THE TEACHER'S CREATED EXAMS!
            $createdExams = \App\Models\Exam::where('teacher_id', auth()->id())->latest()->get();

            // Pass the new array to the view (Notice 'createdExams' at the end)
            return view('dashboards.teacher', compact(
                'recentActivity', 
                'flagsToday', 
                'liveExams',
                'chartDates',
                'chartExams',
                'chartFlags',
                'createdExams'
            ));
        }
    }
}