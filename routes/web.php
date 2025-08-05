<?php

use App\Http\Controllers\AboutusPage\AboutsController;
use App\Http\Controllers\ProfilePage\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventsPage\EventsController;
use App\Http\Controllers\TechnicalPage\LegalCategoryController;
use App\Http\Controllers\ProjectPage\ProjectController;
use App\Http\Controllers\TechnicalPage\DocumentController;
use App\Http\Controllers\Homepage\HomeController;
use App\Models\LegalCategory;
use App\Models\Project;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('table', DashboardController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/events', [EventsController::class, 'mainPageEvent'])->name('events.main');
    Route::post('/events/store',[EventsController::class,'store'])->name('events.store');
    Route::get('profile/submembers', [DashboardController::class, 'viewSubmemer'])->name('profile.submembers');
    Route::get('profile/submembers/create', [DashboardController::class, 'createSubmember'])->name('profile.submembers.create');
    Route::post('profile/submembers/', [DashboardController::class, 'storeSubmember'])->name('profile.submembers.store');
    // Route::get('profile', [DashboardController::class, 'index'])->name('profile.index');
});

Route::get('/homepage', [HomeController::class, 'index'])->name('homepage');
Route::resource('/aboutus',AboutsController::class);
Route::resource('/service',LegalCategoryController::class);
Route::resource('/project',ProjectController::class);
Route::resource('/document',DocumentController::class);
// Route::put('/aboutus/{aboutu}', [AboutsController::class, 'update'])->name('aboutus.update');

// Route::put('aboutus/{aboutu}', [AboutsController::class, 'update'])->name('aboutus.update');
Route::get('/events', [EventsController::class, 'mainPageEvent'])->name('events');
Route::get('/events/create',[EventsController::class,'create'])->name('events.create');
Route::get('/events/{id}', [EventsController::class, 'detailPageEvent'])->name('events.detail');

require __DIR__.'/auth.php';
Route::middleware(['web'])->group(function () {
});

Route::get('/eventsComponent', function () {
    return view('previewnav');
});
