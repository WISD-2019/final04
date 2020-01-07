<?php

namespace App\Http\Controllers;
use App\Leave;
use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Validator;

class LeaveTravelController extends Controller
{
    //
    public function record(){
        $query=Leave::where('user_id',Auth::user()->id)->orderby('id','desc')->paginate(5);
        return View('record',['query'=>$query]);
    }

    public function submit(Request $request ){

        // $v = Validator::make($request->all(), [
        //     'reason' => 'required|string|min:10'
        // ]);
    
        // if ($v->fails())
        // {
        //     return redirect()->back()->withErrors($v->errors());
        // }
        if($request->select=="leave"){
         
            if ($request->hasFile('filename')) {
                $file = $request->file('filename');  //獲取UploadFile例項

                if ( $file->isValid()) { //判斷檔案是否有效
                    $filename = $file->getClientOriginalName(); //檔案原名稱
                    // $extension = $file->getClientOriginalExtension(); //副檔名
                    $filename = $filename;    //重新命名
                    $file->move(public_path(), $filename); //移動至指定目錄

                    Leave::insert([
                        'user_id'=>Auth::user()->id,
                        'type' =>$request->type,
                        'start_time'=>$request->start_time,
                        'end_time'=>$request->end_time,
                        'reason' =>$request->reason,
                        'status'=>0,
                        'prove' =>$filename,
                        'apply_time'=>date('Y-m-d H:i:s')
                    ]);
                    return back()->with('success', '請假申請成功');
                }
                return back()->with('error', '無效的檔案格式');

            }
        }
        else if($request->select=="travel") {
            Travel::insert([
                'user_id'=>Auth::user()->id,
                'location' =>$request->location,
                'start_time'=>$request->start_time,
                'end_time'=>$request->end_time,
                'reason' =>$request->reason,
                'status'=>0,
                'apply_time'=>date('Y-m-d H:i:s')
            ]);
            return back()->with('success', '出差申請成功');
        }
    }
}
