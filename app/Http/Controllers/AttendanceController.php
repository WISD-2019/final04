<?php

namespace App\Http\Controllers;
use App\Works;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attend()
    {
        return View('report');
    }
}
