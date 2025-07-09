<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//  View Layout Header
Route::get('/header', function () {
    return view('Layout.Header');
});


// Event View
Route::get('/event', function () {
    return view('Event.mainevent');
});

Route::get('/eventdetail' , function(){
    return view('Event.eventdetail');
})->name('eventdetail');
