<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Main;
use Illuminate\Support\Facades\Route;


use App\Events\UpdateMessages;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/comments/{messageId}', [CommentController::class, 'viewComments'])->name('viewComments');
Route::post('/postComment', [CommentController::class, 'postComment'])->name('postComment');
});

Route::get('/test-event', function () {
    UpdateMessages::dispatch(1); // Cambia el ID a algo válido
    return 'Evento enviado';
});

require __DIR__ . '/auth.php';
