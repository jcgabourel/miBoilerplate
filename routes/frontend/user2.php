<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\Dashboard2Controller;
use App\Http\Controllers\Frontend\User\ProfileController;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user2.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard2', [Dashboard2Controller::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard2')
        ->breadcrumbs(function (Trail $trail) { 
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user2.dashboard2'));
        });

   

    
});
