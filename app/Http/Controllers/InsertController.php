<?php

namespace App\Http\Controllers;

use App\Check;

use Illuminate\Http\Request;
use Carbon\Carbon;
class InsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
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
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function show(Check $check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function edit(Check $check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Check $check)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy(Check $check)
    {
        //
    }
    public function work(Request $request)
    {
        //
        
        if(($request->input('on_work'))!==null){
            $data=array(
            "user_id"=>$request->input('on_work'),
            "on_work"=> Carbon::now()
            );
            Check::insert($data);
        //   dd($data);
        echo "<script>alert('員工編號：'+'$data[user_id]\\n'+'　上班打卡成功'); location.href = 'on_work';</script>";

        }
        else if(($request->input('off_work'))!==null){
            $data=array(
            "user_id"=>$request->input('off_work'),
            "off_work"=> Carbon::now()
            );
            Check::insert($data);
        echo "<script>alert('員工編號：'+'$data[user_id]\\d'+'　下班打卡成功'); location.href = 'on_work';</script>";
        }
        

        // return redirect('check');
    }
}
