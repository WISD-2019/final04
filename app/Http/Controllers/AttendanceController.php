<?php

namespace App\Http\Controllers;
use App\Works;
use App\User;
use App\Leave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attend()
    {        
        $result=array();
        $work = Works::select('on_work')->get();
        foreach($work as $works)
        {
            array_push($result,substr($works->on_work,0,10));
        }
        $on_work=array_unique($result);
        $query=Works::where('user_id',Auth::user()->id)->get();
        $leave = Leave::all();
        return View('report',['query'=>$query,'leave'=>$leave,'on_work'=>$on_work]);
    }
}
