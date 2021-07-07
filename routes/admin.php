<?php


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register admin routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "admin" middleware group. Now create something great!
    |
    */

    Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'auth'], function() {
        Route::get('/', 'DashboardController@index');
        Route::get('/attendance', 'AttendanceController@index');
        Route::get('/members', 'MemberController@index');
        Route::get('/members-report', 'DashboardController@getMembersList');
    });

   