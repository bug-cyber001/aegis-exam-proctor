<?
namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function joinExam(Request $request)
    {
        // 1. Validate that they actually typed a code
        $request->validate([
            'access_code' => 'required|string|min:6|max:6'
        ]);

        // 2. Find the Exam by the code. If it doesn't exist, throw a 404 error.
        $exam = Exam::where('access_code', $request->access_code)->firstOrFail();

        // 3. Check if the student is already in this exam to prevent duplicates
        if (auth()->user()->exams->contains($exam->id)) {
            return back()->with('error', 'You are already enrolled in this exam.');
        }

        // 4. Attach the student to the exam via the database bridge
        auth()->user()->exams()->attach($exam->id);

        return back()->with('success', 'Successfully joined the exam!');
    }

    public function takeExam($id)
    {
        // Find the exam
        $exam = Exam::findOrFail($id);

        // Security check: Make sure this student actually joined this exam!
        if (!auth()->user()->exams->contains($exam->id)) {
            abort(403, 'You are not enrolled in this exam.');
        }

        return view('dashboards.take-exam', compact('exam'));
    }
}