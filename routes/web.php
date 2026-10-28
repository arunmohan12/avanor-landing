<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::post(
    '/landing-leads',
    [LeadController::class, 'storeLandingV2']
)
    ->middleware('throttle:landing-leads')
    ->name('landing.leads.store');

Route::post(
    '/aldar-enquiry',
    [LeadController::class, 'storeAldarEnquiry']
)
    ->middleware('throttle:landing-leads')
    ->name('landing.aldar-enquiry.store'); 

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
// Route::get('/yas-riva-by-aldar', [LandingPageController::class, 'showYasRivaByAldar']);
// Route::get('/wadeem-gardens-by-modon', [LandingPageController::class, 'showWadeemByModon']);
// Route::get('/palm-central', [LandingPageController::class, 'showPalmCentral']);
// Route::get('/the-heights-by-emaar', [LandingPageController::class, 'showTheheights']);
// Route::get('/bay-estate', [LandingPageController::class, 'showBayEstate']);
//  Route::get('/ghadeer-parks', [LandingPageController::class, 'showGhadeerParks']);
// Route::get('/riverside', [LandingPageController::class, 'showRiverside']);
// Route::get('/mareva', [LandingPageController::class, 'showMareva']);
Route::get('/aldar', [LandingPageController::class, 'showAldarNew']);

//live
Route::domain('the-heights.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showTheheights']);
});
Route::domain('aldaryasriva.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showYasRivaByAldar']);
});
Route::domain('Hudayriyatisland.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showWadeemByModon']);
});
Route::domain('palm-central.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showPalmCentral']);
});
Route::domain('bay-estate.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showBayEstate']);
});
Route::domain('ghadeer-parks.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showGhadeerParks']);
});

Route::domain('riverside.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showRiverside']);
});

Route::domain('the-oasis.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showMareva']);
});
Route::domain('aldar-dubai.sales-centre.net')->group(function () {
    Route::get('/', [LandingPageController::class, 'showAldarNew']);
});