<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
    Route::get('/exams/{id}/start', [ExamController::class, 'start'])->name('exams.start');
    Route::post('/exams/{id}/submit', [ExamController::class, 'submit'])->name('exams.submit');
    Route::get('/exams/{id}/scorecard', [ExamController::class, 'scorecard'])->name('exams.scorecard');
    Route::get('/exams/scores/{studentid}', [ExamController::class, 'allScores'])->name('exams.allScores');
});
require __DIR__ . '/auth.php';
