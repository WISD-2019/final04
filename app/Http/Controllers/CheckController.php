<?php

namespace App\Http\Controllers;


use App\check;
use App\Leave;
use Illuminate\Http\Request;


class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return View('check');
    }

    public function loadpage(Request $request)
    {
        $leaveall=array();
        $leaveall = leave::all();

        $countid=0;
        $countid = leave::SELECT('id')->count();
        return View('check',['leaveall' => $leaveall,'countid' => $countid]);

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

     */
    public function show(Check $check)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Check $check)

    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

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


        return redirect('check')->with('selectid', $selectid);
    }


    /**
     * Remove the specified resource from storage.
     *

     * @param  \App\check  $check
     * @return \Illuminate\Http\Response
     */


    public function destroy(Check $check)

    {
        //
    }
}
