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
Route::get('tt','ProcessController@login');

Auth::routes();

Route::get('Check','CheckController@load_page');
Route::post('Check_update', "CheckController@update");


Route::get('leave', function () {
    return view('leave');
});
Route::post('leave','LeaveController@submit')->name('submit');

Route::get('check', function () {
    return view('check.check');
});
Route::post('create','CheckController@create')->name('create');
Route::group(['middleware'=>'auth'],function(){
    Route::get('record','LeaveController@record')->name('record');

});


