<?php

namespace App\Http\Controllers;
use App\Works;
use App\User;
use App\Leave;
use App\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attend()
    {       
        //抓取打卡資料表，並對應到登入的使用者
        $query=Works::where('user_id',Auth::user()->id)->get();
        //給一個空的陣列，搜尋打卡資料表中的on_work，把重複的資料過濾掉
        $result=array();
        $work = Works::select('on_work')->get();
        foreach($work as $works)
        {
            array_push($result,substr($works->on_work,0,10));
        }
        $on_work=array_unique($result);

        //抓取請假資料表，並對應到登入的使用者
        $leave = Leave::where('user_id',Auth::user()->id)->get();
        //抓取出差資料表，並對應到登入的使用者
        $travel = Travel::where('user_id',Auth::user()->id)->get();
        
        return View('report',['query'=>$query,'leave'=>$leave,'on_work'=>$on_work,'travel'=>$travel]);
    }
}
