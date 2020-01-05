<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user=User::all();
        return View('user',['user'=>$user]);
    

    }
    public function insert(Request $request){
       
        $data=array(
            'user_id'=>$request->input('user_id'),
            'type'=>$request->input('type'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            "sex"=>$request->input('sex'),
            "age"=>$request->input('age'),
            "work"=>$request->input('work'),
            "phone"=>$request->input('phone')
        );
        
        User::insert($data);

        // return redirect('user');
       
    }
    public function delete(){
        $user=User::all();
        return View('user',['user'=>$user]);
    

    }
}
