<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'teacher') {
            // Fetch the 5 most recent violations, including the student who did it
            $recentActivity = \App\Models\Violation::with('user')
                ->latest()
                ->take(5)
                ->get();

            return view('dashboards.teacher', compact('recentActivity'));
        }

        return view('dashboards.student');
    }
}