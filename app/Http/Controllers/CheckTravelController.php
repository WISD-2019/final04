<?php

namespace App\Http\Controllers;



use App\Travel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;



class CheckTravelController extends Controller
{
    public function index()
    {
        //
    }

    public function load_page(Request $request)
    {
        $travel = Travel::paginate(5);
        return View('checkTravel',['travel' => $travel]);
    }

    private $docker_ip="lai.ofdl.nctu.me/line/push22.php";

    public function updateTravelStatus(Request $request)
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
