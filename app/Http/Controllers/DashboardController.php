<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // --- 1. THE TEACHER DASHBOARD ---
        if (auth()->user()->role === 'teacher') {
            
            // Existing Chart & Exam Data
            $recentActivity = \App\Models\Violation::with('user')->latest()->take(5)->get();
            $flagsToday = \App\Models\Violation::whereDate('created_at', today())->count();
            $liveExams = \App\Models\Exam::where('teacher_id', auth()->id())->count();
            $createdExams = \App\Models\Exam::where('teacher_id', auth()->id())->latest()->get();

            $chartDates = [];
            $chartExams = [];
            $chartFlags = [];

            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i);
                $chartDates[] = $date->format('M d');
                $chartExams[] = \App\Models\Exam::where('teacher_id', auth()->id())
                                    ->whereDate('created_at', $date)->count();
                $chartFlags[] = \App\Models\Violation::whereDate('created_at', $date)->count();
            }

            // NEW: Fetch a quick preview of 3 students
            $previewStudents = \App\Models\User::where('role', 'student')
                ->withCount('violations')
                ->take(3)
                ->get()
                ->map(function($student) {
                    if ($student->violations_count >= 5) {
                        $student->risk_level = 'High';
                        $student->risk_color = 'red';
                    } elseif ($student->violations_count > 0) {
                        $student->risk_level = 'Medium';
                        $student->risk_color = 'amber';
                    } else {
                        $student->risk_level = 'Low';
                        $student->risk_color = 'emerald';
                    }
                    return $student;
                });

            // Make sure 'previewStudents' is in this list!
            return view('dashboards.teacher', compact(
                'recentActivity', 'flagsToday', 'liveExams', 'chartDates', 'chartExams', 'chartFlags', 'createdExams', 'previewStudents'
            ));
        } 
        
        // --- 2. THE STUDENT DASHBOARD ---
        elseif (auth()->user()->role === 'student') {
            $myExams = auth()->user()->exams()->latest()->get();
            return view('dashboards.student', compact('myExams'));
        }

        return view('dashboard');
    }
}