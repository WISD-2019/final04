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
            $user = User::paginate(5);
            $id=User::all();
            foreach($id as $userid)
            {
                
            }
            return View('user',['user'=>$user,'userid'=>$userid]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */

    //新增人員
    public function insert(Request $request){
       
         $v = Validator::make($request->all(), [
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //             'user_id' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            // 'phone' => ['required', 'string', 'min:10', 'max:10'],]);
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_id' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'username' => ['required', 'string', 'max:255', 'unique:users']

         ]);
            if ($v->fails()){
                return redirect()->back()->withErrors($v->errors());
            }


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
    //修改人員
    public function update(Request $request)
    {
    $user_id = $request->input('user_id1');  
    $name = $request->input('name1');
    $email = $request->input('email1');
    $age = $request->input('age1');
    $sex= $request->input('sex1');
    $work= $request->input('work1');
    $phone = $request->input('phone1');
   
    User::where('id',$request->input('id'))->update(['user_id'=>$user_id,'name' =>$name,'email' => $email,'age' => $age,'sex' => $sex,'work' => $work,'phone' => $phone]);
    
    return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Works  $works
     * @return \Illuminate\Http\Response
     */
    //刪除人員
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
            "on_work"=> Carbon::now(),
            "name"=>substr(User::where('user_id',$request->input('on_work'))->get("name"),10,-3)

            );
            Works::insert($data);
        echo "<script>alert('員工編號：'+'$data[user_id]\\n'+'　上班打卡成功'); location.href = 'on_work';</script>";

        }
        else if(($request->input('off_work'))!==null){
            $user_id=$request->input('off_work'); 
            Works::where('on_work','like',date("Y-m-d").'%')->where('user_id',$user_id)->update(['off_work' =>Carbon::now() ]);
            echo "<script>alert('員工編號：'+'$user_id\\n'+'　下班打卡成功'); location.href = 'on_work';</script>";
        }
        

        // return redirect('check');
    }
}
