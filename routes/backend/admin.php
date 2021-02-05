<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\ShowingController;
use App\Http\Controllers\TheatreController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('cinemas', [CinemaController::class, 'index'])
->name('cinemas')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push('Cinemas', route('admin.cinemas'));
});

Route::get('theatres', [TheatreController::class, 'index'])
->name('theatres')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push('Theatres', route('admin.theatres'));
});

Route::get('showings', [ShowingController::class, 'index'])
->name('showings')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push('Showings', route('admin.showings'));
});

Route::get('bookings', [BookingController::class, 'admin'])
->name('bookings')
->breadcrumbs(function (Trail $trail) {
    $trail->parent('admin.dashboard')->push('Bookings', route('admin.bookings'));
});
