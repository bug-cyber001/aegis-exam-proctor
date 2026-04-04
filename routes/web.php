<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. Public Routes
Route::get('/', function () {
    return view('welcome');
});

// 2. Protected Routes (Must be logged in)
Route::middleware('auth', 'verified')->group(function () {
    
    // The Dashboard (Handled by your new Controller)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Exam Routes
    Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
    Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
    Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');

    // Violation AI Logging
    Route::post('/violations', function (Request $request) {
        Violation::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'detected_at' => now(),
        ]);
        return response()->json(['status' => 'logged']);
    });

}); // This closes the main middleware group

require __DIR__.'/auth.php';