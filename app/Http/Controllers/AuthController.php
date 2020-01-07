<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticateLeave()
    {
        if (Auth::user()->type==1)
        {
            return redirect()->intended('check');
        }
        return back();
    }
    public function authenticateTravel()
    {
        if (Auth::user()->type==1)
        {
            return redirect()->intended('checkTravel');
        }
        return back();
    }

}
