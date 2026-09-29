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


Route::post('/enquiry', [LeadController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('leads.store');


Route::post(
    '/landing-leads',
    [LeadController::class, 'storeLandingV2']
)
    ->middleware('throttle:5,10')
    ->name('landing.leads.store');


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

//local
Route::get('/yas-riva-by-aldar', [LandingPageController::class, 'showYasRivaByAldar']);
Route::get('/wadeem-gardens-by-modon', [LandingPageController::class, 'showWadeemByModon']);
Route::get('/palm-central', [LandingPageController::class, 'showPalmCentral']);
Route::get('/the-heights-by-emaar', [LandingPageController::class, 'showTheheights']);

//live
// Route::domain('aldaryasriva.sales-centre.net')->group(function () {
//     Route::get('/', [LandingPageController::class, 'showYasRivaByAldar']);
// });
// Route::domain('Hudayriyatisland.sales-centre.net')->group(function () {
//     Route::get('/', [LandingPageController::class, 'showWadeemByModon']);
// });
// Route::domain('palm-central.sales-centre.net')->group(function () {
//     Route::get('/', [LandingPageController::class, 'showPalmCentral']);
// });