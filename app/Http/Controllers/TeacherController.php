<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function storeExam(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer|min:5',
            'start_time' => 'nullable|date|after_or_equal:now', // Must be future date if scheduled
        ]);

        // If they checked the box to schedule it, use that time. Otherwise, use right now.
        $isScheduled = $request->has('is_scheduled');
        $startTime = $isScheduled ? $request->start_time : now();
        $status = $isScheduled ? 'pending' : 'active';

        $exam = Exam::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'access_code' => strtoupper(\Illuminate\Support\Str::random(6)),
            'teacher_id' => auth()->id(),
            'status' => $status,
            'start_time' => $startTime,
        ]);

        return back()->with('success', 'Exam created! Share this code with your students: ' . $exam->access_code);
    }

    public function destroyExam($id)
    {
        // 1. Find the exact exam
        $exam = \App\Models\Exam::findOrFail($id);

        // 2. Security Check: Ensure the logged-in teacher owns this exam
        if ($exam->teacher_id !== auth()->id()) {
            abort(403, 'Unauthorized action. You do not own this exam.');
        }

        // 3. Delete it from the database!
        $exam->delete();

        return back()->with('success', 'Exam successfully deleted.');
    }

    public function studentsList()
    {
        // Fetch all users who are students
        // withCount() automatically counts their related exams and violations!
        $students = \App\Models\User::where('role', 'student')
            ->withCount('exams')
            ->withCount('violations')
            ->orderBy('name')
            ->get()
            ->map(function($student) {
                // Calculate Risk Level dynamically!
                if ($student->violations_count >= 5) {
                    $student->risk_level = 'High';
                    $student->risk_color = 'red';
                } elseif ($student->violations_count > 0) {
                    $student->risk_level = 'Medium';
                    $student->risk_color = 'amber';
                } else {
                    $student->risk_level = 'Safe';
                    $student->risk_color = 'emerald';
                }
                return $student;
            });

        // NEW: Calculate how many exams are scheduled/created today
        $examsToday = \App\Models\Exam::whereDate('created_at', today())->count();

        // Pass BOTH variables to the view
        return view('dashboards.students', compact('students', 'examsToday'));
    }

    public function exams()
    {
        // Fetch all exams created by this teacher, newest first
        $exams = \App\Models\Exam::where('teacher_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboards.exams', compact('exams'));
    }

    public function reports()
    {
        // Fetch all violations, newest first, and include the student data
        $violations = \App\Models\Violation::with('user')->latest()->get();

        // Send the data to a new 'reports' view
        return view('dashboards.reports', compact('violations'));
    }

    public function createExam()
    {
        return view('dashboards.create-exam');
    }

    public function questionBank()
    {
        return view('dashboards.question-bank');
    }
}