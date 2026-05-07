<?php
// app/Http/Controllers/StudentManagementController.php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentManagementController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->latest()->paginate(10);
        return view('teacher.students.index', compact('students'));
    }

    public function create()
    {
        return view('teacher.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'student_id' => ['required', 'string', 'unique:students,student_id'],
            'class_name' => ['nullable', 'string'],
            'department' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
        ]);

        Student::create([
            'user_id' => $user->id,
            'student_id' => $validated['student_id'],
            'class_name' => $validated['class_name'] ?? null,
            'department' => $validated['department'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('teacher.students.index')
            ->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        $student->load('user');
        return view('teacher.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $student->user_id],
            'student_id' => ['required', 'string', 'unique:students,student_id,' . $student->id],
            'class_name' => ['nullable', 'string'],
            'department' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ]);

        $student->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $student->update([
            'student_id' => $validated['student_id'],
            'class_name' => $validated['class_name'] ?? null,
            'department' => $validated['department'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('teacher.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->user()->delete();

        return redirect()
            ->route('teacher.students.index')
            ->with('success', 'Student removed successfully.');
    }
}