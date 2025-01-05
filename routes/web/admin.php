<?php
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RailwayController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'auth.admin',
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [RegisteredUserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/railways', [RailwayController::class, 'index'])->name('railways');
    Route::post('/railways', [RailwayController::class, 'store'])->name('railways.store');
    Route::put('/railways/{railway}', [RailwayController::class, 'update'])->name('railways.update');
    Route::delete('/railways/{railway}', [RailwayController::class, 'destroy'])->name('railways.delete');
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks');
    Route::post('/feedbacks', [FeedbackController::class, 'store'])->name('feedbacks.store');
    Route::post('/feedbacks/{feedback}', [FeedbackController::class, 'reply'])->name('feedbacks.reply');
    Route::put('/feedbacks/{feedback}', [FeedbackController::class, 'update'])->name('feedbacks.update');
    Route::delete('/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.delete');
});
