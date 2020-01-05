<?php

namespace App\Http\Controllers;


use App\Leave;
use App\User;

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

    public function load_page(Request $request)
    {
        $leave = Leave::paginate(5);
        $user = User::SELECT('user_id','name');

        $leave_id = Leave::SELECT('user_id');

        $count_id = Leave::SELECT('id')->count();

        return View('check',['leave' => $leave,'count_id' => $count_id]);
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
    public function update(Request $request)
    {
        $selectid = $request->input("id");
        $updateRow = Leave::where('id', $request->input("id"))->first();
        if(!$updateRow){
            return redirect('Check')->with('selectid', $selectid);
        }
        $updateRow->status = $request->input('update_status');
        $updateRow->save();
        return redirect('Check')->with('selectid', $selectid);
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
