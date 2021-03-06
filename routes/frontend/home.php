<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('/booking/new/{showing}', [BookingController::class, 'show']);

Route::get('/bookings', [BookingController::class, 'index']);

//No need to have terms in demo application
//Route::get('terms', [TermsController::class, 'index'])
//    ->name('pages.terms')
//    ->breadcrumbs(function (Trail $trail) {
//        $trail->parent('frontend.index')
//            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
//    });
