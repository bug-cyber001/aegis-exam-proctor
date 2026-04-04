<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
{
    // This fetches all exams from the database
    $exams = \App\Models\Exam::all(); 

    return view('exams.index', compact('exams'));
}
    public function create()
{
    return view('exams.create');
}
public function store(Request $request)
{
    // 1. Validate the data (Make sure it's not empty)
    $validated = $request->validate([
        'title' => 'required|max:255',
        'duration' => 'required|integer',
    ]);

    // 2. Save it to the database
    \App\Models\Exam::create([
        'title' => $request->title,
        'duration_minutes' => $request->duration,
        'is_ai_proctoring_enabled' => $request->has('is_ai_proctoring_enabled'),
    ]);

    // 3. Go back to the list with a success message
    return redirect('/exams')->with('success', 'Exam created successfully!');
}
}
