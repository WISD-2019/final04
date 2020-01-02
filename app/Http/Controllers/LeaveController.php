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
}
