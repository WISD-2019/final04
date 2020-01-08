<?php

namespace App\Http\Controllers;


use App\Leave;
use GuzzleHttp\Client;
use Illuminate\Http\Request;



class CheckController extends Controller
{
    public function index()
    {
        //
    }

    public function load_page(Request $request)
    {
        $leave = Leave::paginate(5);
        return View('check',['leave' => $leave]);
    }

    private $docker_ip="lai.ofdl.nctu.me/line/push22.php";
    public function updateLeaveStatus(Request $request)
    {
        $updateRow = Leave::where('id', $request->input("id"))->first();
        if(!$updateRow){
            return redirect('check');
        }
        $updateRow->status = $request->input('update_status');
        $updateRow->save();

        $client = new \GuzzleHttp\Client();
        $res = $client->POST($this->docker_ip,[

            'form_params' => [
                "msg" => '申請人'.$request->user_id.'的請假申請已通過',
                "pwd"=>"opendoor"
            ]

        ]);
        return back()->with('success', '審核成功');
    }

}
