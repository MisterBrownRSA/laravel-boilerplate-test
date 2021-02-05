<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\CinemaController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('cinema', [CinemaController::class, 'index'])
->name('cinema')
->breadcrumbs(function (Trail $trail) {
    $trail->push('Cinema', route('admin.cinema'));
});
