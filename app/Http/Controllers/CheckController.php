<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\check;
use App\Leave;
use Illuminate\Http\Request;


=======
use App\Check;

use Illuminate\Http\Request;
use Carbon\Carbon;
>>>>>>> c2cf393d8a8ac93a867722252110659de0f5a6d8
class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return View('check');
    }

    public function loadpage(Request $request)
    {
        $leaveall=array();
        $leaveall = leave::all();

        $countid=0;
        $countid = leave::SELECT('id')->count();
        return View('check',['leaveall' => $leaveall,'countid' => $countid]);
=======
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if(($request->input('on_work'))!==null){
            $data=array(
            "user_id"=>$request->input('on_work'),
            "on_work"=> Carbon::now()
            );
            Check::insert($data);
        //   dd($data);
        echo "<script>alert('$data[user_id]'+'上班打卡成功'); location.href = 'check';</script>";

        }
        else if(($request->input('off_work'))!==null){
            $data=array(
            "user_id"=>$request->input('off_work'),
            "off_work"=> Carbon::now()
            );
            Check::insert($data);
        echo "<script>alert('$data[user_id]'+'下班打卡成功'); location.href = 'check';</script>";
        }
        

        // return redirect('check');
>>>>>>> c2cf393d8a8ac93a867722252110659de0f5a6d8
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function show(check $check)
=======
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function show(Check $check)
>>>>>>> c2cf393d8a8ac93a867722252110659de0f5a6d8
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function edit(check $check)
=======
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function edit(Check $check)
>>>>>>> c2cf393d8a8ac93a867722252110659de0f5a6d8
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, check $check)
    {
        $selectid = $request->input("update_id");
        $updateRow = Leave::where('id', $request->input("update_id"))->first();
        $updateRow->type = $request->input("update_type");
        $updateRow->reason = $request->input("update_reason");
        $updateRow->apply_time = $request->input("update_apply_time");
        $updateRow->save();


        return redirect('check')->with('selectid',$selectid);
=======
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Check $check)
    {
        //
>>>>>>> c2cf393d8a8ac93a867722252110659de0f5a6d8
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy(check $check)
=======
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy(Check $check)
>>>>>>> c2cf393d8a8ac93a867722252110659de0f5a6d8
    {
        //
    }
}
