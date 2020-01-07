<?php

namespace App\Http\Controllers;


use App\Leave;
use App\Travel;
use Auth;
use Illuminate\Http\Request;



class CheckController extends Controller
{
    public function index()
    {
        //
    }

    public function load_page_leave(Request $request)
    {
        $leave = Leave::paginate(5);
        return View('check',['leave' => $leave]);
    }
    public function load_page_travel(Request $request)
    {
        $travel = Travel::paginate(5);
        return View('checkTravel',['travel' => $travel]);
    }

    public function update_leave(Request $request)
    {

        $updateRow = Leave::where('id', $request->input("id"))->first();
        if(!$updateRow){
            return redirect('check');
        }
        $updateRow->status = $request->input('update_status');
        $updateRow->save();
        return back()->with('success', '審核成功');
    }
    public function update_travel(Request $request)
    {

        $updateRow = Travel::where('id', $request->input("id"))->first();
        if(!$updateRow){
            return redirect('checkTravel');
        }
        $updateRow->status = $request->input('update_status');
        $updateRow->save();
        return back()->with('success', '審核成功');
    }
}
