<?php

namespace App\Http\Controllers;

use App\Works;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //人員介面
    public function index()
    {
            $user=User::all();
            return View('user',['user'=>$user]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //新增人員
    public function insert(Request $request){
       
        $data=array(
            'user_id'=>$request->input('user_id'),
            'type'=>$request->input('type'),
            'username'=>$request->input('username'),
            'password'=>Hash::make($request->input('password')),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            "sex"=>$request->input('sex'),
            "age"=>$request->input('age'),
            "work"=>$request->input('work'),
            "phone"=>$request->input('phone')
        );
        
        User::insert($data);

        return redirect('user');
       
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
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function show(Works $works)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function edit(Works $works)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Works $works)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    public function delete (Request $request)
    {
        User::where('id',$request->input('delete'))->delete();
        return redirect('user');
    }
    public function work(Request $request)
    {
        //
        
        if(($request->input('on_work'))!==null){
            $data=array(
            "user_id"=>$request->input('on_work'),
            "on_work"=> Carbon::now()
            );
            Works::insert($data);
        //   dd($data);
        echo "<script>alert('員工編號：'+'$data[user_id]\\n'+'　上班打卡成功'); location.href = 'on_work';</script>";

        }
        else if(($request->input('off_work'))!==null){
            $data=array(
            "user_id"=>$request->input('off_work'),
            "off_work"=> Carbon::now()
            );
            Works::insert($data);
        echo "<script>alert('員工編號：'+'$data[user_id]\\d'+'　下班打卡成功'); location.href = 'on_work';</script>";
        }
        

        // return redirect('check');
    }
}
