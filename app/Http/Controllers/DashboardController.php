<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Attendance;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('D, d/M/y',time());
        $user_id = Auth::user()->id;
        $arrive = Attendance::where(['user_id' => $user_id])->whereRaw('date(created_at) = ?', [Carbon::today()])->get()->toArray();
        
        if(empty($arrive)){
            $logged_in = "false";
        }
        else{
            $logged_in = "true";
        }
        return view('dashboard',compact('today','logged_in'));
    }
}
