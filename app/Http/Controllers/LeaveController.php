<?php

namespace App\Http\Controllers;
use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    //
    public function record(){
        $query=Leave::where('user_id',Auth::user()->id)->get();
        return View('record',['query'=>$query]);
    }

    public function submit(Request $request ){
        Leave::insert([
            'user_id'=>Auth::user()->id,
            'type' =>$request->type,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'reason' =>$request->reason,
            'status'=>0,
            'prove' =>$request->prove
        ]);
        return back()->with('success', '申請成功');
    }
}
