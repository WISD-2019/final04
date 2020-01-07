<?php

namespace App\Http\Controllers;


use App\Leave;
use App\Travel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;



class CheckController extends Controller
{
    public function index()
    {
        //
    }

    public function load_page_leave(Request $request)
    {
        $leave = Leave::paginate(5);
        return View('check',['leave' => $leave]);
    }
    public function load_page_travel(Request $request)
    {
        $travel = Travel::paginate(5);
        return View('checkTravel',['travel' => $travel]);
    }

    private $docker_ip="lai.ofdl.nctu.me/line/push22.php";
    public function update_leave(Request $request)
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
    public function update_travel(Request $request)
    {

        $updateRow = Travel::where('id', $request->input("id"))->first();
        if(!$updateRow){
            return redirect('checkTravel');
        }
        $updateRow->status = $request->input('update_status');
        $updateRow->save();

        $client = new \GuzzleHttp\Client();
        $res = $client->POST($this->docker_ip,[

            'form_params' => [
                "msg" => '申請人'.$request->user_id.'的出差申請已通過',
                "pwd"=>"opendoor"
            ]

        ]);
        return back()->with('success', '審核成功');
    }
}
