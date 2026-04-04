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
}