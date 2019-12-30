<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function reg(Request $request){
    $email = $request->input('email');
    $un = $request->input('username');
    $ac = $request->input('account');
    $pw = $request->input('password');
    $lic = $request->input('license');
    User::create([
        'name' => $un,
        'email' => $email,
        'password' => $pw,
    ]);
    return redirect('/');
    }

    public function login(Request $request){
        $login_user=User::where('name',$request->account)->where('password',$request->passwordinput)->first();
                if($login_user !==null){
                    Auth::loginUsingId($login_user->id,true);
                    return redirect('page');
                }
                // return view('page',['title'=>'登入後使用','msg'=>'帳號或密碼錯誤']);
                return redirect('page');
    }
    
    public function logout(){   
        Auth::logout();
        return redirect('/');
    }

}