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

Route::get('Check','CheckController@load_page');
Route::post('Check_update', "CheckController@update");


Route::get('leave', function () {
    return view('leave');
});
Route::post('leave','LeaveController@submit')->name('submit');
//打卡頁面
Route::get('on_work', function () {
    return view('attendance');
});
//打卡頁面傳送資料
Route::post('work','InsertController@work')->name('work');

Route::group(['middleware'=>'auth'],function(){
    Route::get('record','LeaveController@record')->name('record');

});


//人員新增刪除修改
Route::group(['prefix'=>'user'],function (){
    Route::get('/','InsertController@index');
    Route::post('/insert','InsertController@insert')->name('insert');
    // Route::delete('{users}', 'InsertController@destroy');
    Route::post('/delete','InsertController@delete')->name('delete');
    Route::post('/update','InsertController@update')->name('update');

});
// Route::get('user', function () {
//     return view('user');
// });
// Route::post('insert','UserController@insert')->name('insert');




