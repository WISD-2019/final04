<?php

namespace App\Http\Controllers;


use App\Leave;
use App\Travel;

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

    public function load_page_leave(Request $request)
    {
        $leave = Leave::paginate(5);
        $count_id = Leave::SELECT('id')->count();

        return View('check',['leave' => $leave,'count_id' => $count_id]);
    }
    public function load_page_travel(Request $request)
    {
        $travel = Travel::paginate(5);
        $count_id = Travel::SELECT('id')->count();
        return View('checkTravel',['travel' => $travel,'count_id' => $count_id]);
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
