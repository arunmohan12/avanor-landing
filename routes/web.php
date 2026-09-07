<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/palm-jebel-ali', function () {
    return view('landingpages.palm-jebel-ali');
});
Route::post('/enquiry', [LeadController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('leads.store');
