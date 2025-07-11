<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventsController;
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
    // Route::get('/events', [EventsController::class, 'mainPageEvent'])->name('events.main');
});
Route::get('/events', [EventsController::class, 'mainPageEvent'])->name('events.main');
Route::post('/events/store',[EventsController::class,'store'])->name('events.store');
Route::get('/events/create',[EventsController::class,'create'])->name('events.create');
Route::get('/events/{id}', [EventsController::class, 'detailPageEvent'])->name('events.detail');

require __DIR__.'/auth.php';
Route::middleware(['web'])->group(function () {
});

Route::get('/eventsComponent', function () {
    return view('previewComponentCard');
});
