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
    return view('page');
});

Route::group([],function (){
    Route::post('reg','ProcessController@reg')->name('reg');  
    Route::post('login','ProcessController@login')->name('login');
    Route::get('logout','ProcessController@logout')->name('logout');
});


Route::get('check', function () {
    return view('check.check');
});

