<?php

use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckUserMiddleware;
use Illuminate\Support\Facades\Route;

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
    
});

//Controlling Download Through Middleware. 2 download in 1 minutes
Route::get('/download',[MiddlewareController::class,'downloadFile'])->middleware(['auth','throttle:2,1']);

//Using own made middileware to check if the user is loggedin
Route::get('/private-message',[MiddlewareController::class,'privateMessage'])->middleware(CheckUserMiddleware::class);

require __DIR__.'/auth.php';
