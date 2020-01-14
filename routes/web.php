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

//請假審核
Route::group(['middleware'=>'auth'],function(){
    //頁面請假審核
    Route::get('checkLeave','CheckLeaveController@load_page');
    //頁面出差審核
    Route::get('checkTravel','checkTravelController@load_page');
    //請假審核管理者身分驗證
    Route::get('checkLeaveAuth', ['as' => 'LeaveAuth' , 'uses' => 'AuthController@authenticateLeave']);
    //出差審核管理者身分驗證
    Route::get('checkTravelAuth', ['as' => 'TravelAuth' , 'uses' => 'AuthController@authenticateTravel']);
    });
//更新請假審核狀態Status
Route::post('updateLeaveStatus', "CheckLeaveController@updateLeaveStatus");
//更新出差審核狀態Status
Route::post('updateTravelStatus', "checkTravelController@updateTravelStatus");




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
Route::group(['middleware'=>'auth'],function(){
Route::get('attend','AttendanceController@attend')->name('attend');
});


//人員新增刪除修改
Route::group(['prefix'=>'user','middleware'=>'auth'],function (){
    //人員開始畫面，倒出所有人員的資料
    Route::get('/','InsertController@index');
    //人員新增
    Route::post('/insert','InsertController@insert')->name('insert');
    //人員刪除
    // Route::delete('{users}', 'InsertController@destroy');
    Route::post('/delete','InsertController@delete')->name('delete');
    //人員修改
    Route::post('/update','InsertController@update')->name('update');


});





