<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/faq', function () {
    return Inertia::render('FAQ');
})->name('faq');

Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'submit'])->name('feedback.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/history', [FeedbackController::class, 'show'])->name('history');
});


Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(config('fortify.middleware', ['web']))
    ->middleware(['guest:' . config('fortify.guard')])
    ->name('register.store');
