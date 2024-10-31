<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/post/store', [PostController::class, 'store'])->name('PostStore');
Route::get('/post/all', [WelcomeController::class, 'mypost'])->name('mypost');
Route::get('/pot/update{post_id}', [PostController::class, 'update'])->name('update');
Route::post('/post/postupdate{post_id}', [PostController::class, 'postUpdat'])->name('postUpdat');
Route::get('/post{post_id}', [PostController::class, 'delete'])->name('delete');
Route::get('/post/single{post_id}', [WelcomeController::class, 'singlePost'])->name('singlePost');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

