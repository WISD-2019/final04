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

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::get('checkTravel','CheckController@load_page_travel');
    Route::get('check','CheckController@load_page_leave');
    });

Route::get('LeaveAuth','AuthController@authenticateLeave');
Route::get('TravelAuth','AuthController@authenticateTravel');
Route::post('check_update_leave', "CheckController@update_leave");
Route::post('check_update_travel', "CheckController@update_travel");




//打卡頁面
Route::get('on_work', function () {
    return view('attendance');
});
//打卡頁面傳送資料
Route::post('work','InsertController@work')->name('work');

Route::group(['middleware'=>'auth'],function(){
    Route::get('leave', function () {
        return view('leave');
    });
    Route::post('leave','LeaveTravelController@submit')->name('submit');
    Route::get('record','LeaveTravelController@record')->name('record');

});

//報表
Route::get('attend','AttendanceController@attend')->name('attend');



//人員新增刪除修改
Route::group(['prefix'=>'user'],function (){

    Route::get('/','UserController@index');
    Route::post('/insert','UserController@insert')->name('insert');
    Route::post('/delete','UsersController@delete')->name('delete');
    // Route::post('/update','InsertController@update')->name('update');

    Route::get('/','InsertController@index');
    Route::post('/insert','InsertController@insert')->name('insert');
    // Route::delete('{users}', 'InsertController@destroy');
    Route::post('/delete','InsertController@delete')->name('delete');
    Route::post('/update','InsertController@update')->name('update');


});





