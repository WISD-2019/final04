![image](首頁.png)
## 系統的作用

人員管理、請假出差、審核請假及出差、出勤記錄報表

- 讓使用者可以清楚自己的出勤狀況
- 讓使用者透過此系統的簡單操作就可以進行請假及出差的申請
- 讓管理者透過此系統的簡單操作就可進行人員的新增修改刪除
- 讓管理者透過此系統的簡單操作就可進行員工的請假及出差的審核

## 系統的主要功能

首頁
- Route::get('/', function () {return view('page');});

請假審核
- 頁面請假審核
-- (Route::get('checkLeave','CheckLeaveController@load_page');)
- 頁面出差審核
-- Route::get('checkTravel','checkTravelController@load_page');
- 請假審核管理者身分驗證
-- Route::get('checkLeaveAuth', ['as' => 'LeaveAuth' , 'uses' => 'AuthController@authenticateLeave']);
- 出差審核管理者身分驗證
-- Route::get('checkTravelAuth', ['as' => 'TravelAuth' , 'uses' => 'AuthController@authenticateTravel']);

- 更新請假審核狀態Status
- Route::post('updateLeaveStatus', "CheckLeaveController@updateLeaveStatus");
- 更新出差審核狀態Status
- Route::post('updateTravelStatus', "checkTravelController@updateTravelStatus");


打卡頁面
-- Route::get('on_work', function () {return view('attendance');});

- 打卡頁面傳送資料
-- Route::post('work','InsertController@work')->name('work');


- Route::get('leave', function () { return view('leave'); });
- Route::post('leave','LeaveTravelController@submit')->name('submit');
- Route::get('record','LeaveTravelController@record')->name('record')

報表
-- Route::get('attend','AttendanceController@attend')->name('attend');


人員新增刪除修改
- 人員開始畫面，倒出所有人員的資料
-- Route::get('/','InsertController@index');
- 人員新增
-- Route::post('/insert','InsertController@insert')->name('insert');
- 人員刪除
-- Route::post('/delete','InsertController@delete')->name('delete');
- 人員修改
-- Route::post('/update','InsertController@update')->name('update');



## 初始專案與DB負責的同學
