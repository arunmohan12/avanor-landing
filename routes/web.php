<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/palm-jebel-ali', function () {
//    return view('landingpages.palm-jebel-ali');
//});

Route::get('/palm-jebel-ali', [LandingPageController::class, 'showPalmJebelAli']);


Route::post('/enquiry', [LeadController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('leads.store');
Route::post(
    '/landing-leads',
    [LeadController::class, 'storeLandingV2']
)->name('landing.leads.store');


Route::get('/thank-you', function () {
    return view('thank-you');
})->name('landing.thank-you');

Route::get('/privacy-policies', function () {
    return view('privacypolicy');
})->name('landing.privacy-policy');

Route::get('/terms-and-condition', function () {
    return view('termsandconditions');
})->name('landing.terms-and-conditions');



//Pages
Route::get('/the-heights-by-emaar', [LandingPageController::class, 'showTheheights']);
Route::get('/wadeem-gardens-by-modon', [LandingPageController::class, 'showWadeemByModon']);
Route::domain('aldaryasriva.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showYasRivaByAldar']);
});
Route::view('/wadeem', 'landingpages.demowadeem')
    ->name('landing.wadeem');
