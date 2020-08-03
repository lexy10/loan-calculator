<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('login');
    } else {
        return redirect()->route('dashboard');
    }
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', 'DashboardController@home')->name('dashbaord');

    Route::post('/calculate-loan', 'DashboardController@calculateLoan')->name('calculate_loan');

    Route::get('/calculate-loan', 'DashboardController@loadRepaymentResult')->name('load_repayment');

});


