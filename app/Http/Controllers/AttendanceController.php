<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function attendance(){
        /* Each user has a role entry in the database.
           User that to show the attendance. If user is 'user' only retrieve their attendance logs else get all
           The results will be sent to the view as an array which you can use to writeout the html
        */
        $attendanceLogs = [];
        if(Auth::user()->role == 'user'){
            $current_user = [];
            $current_user['tab_class'] = 'active';
            $current_user['name'] = Auth::user()->name;
            $current_user['email'] = Auth::user()->email;
            $current_user['id'] = Auth::user()->id;
            $userAttendance = Attendance::where('user_id',$current_user['id'])->get()->toArray();
            $current_user['attendance'] = $userAttendance;
            array_push($attendanceLogs,$current_user);
        }
        else if(Auth::user()->role == 'admin'){
            $users = User::all()->toArray();
            $toggle_class = 1;
            foreach ($users as $user){

                $current_user = [];
                if($toggle_class == 1 ){
                    $current_user['tab_class'] = 'active';
                }
                else{
                    $current_user['tab_class'] = '';
                }
                $current_user['name'] = $user['name'];
                $current_user['email'] = $user['email'];
                $current_user['id'] = $user['id'];
                $userAttendance = Attendance::where('user_id',$current_user['id'])->get()->toArray();
                $current_user['attendance'] = $userAttendance;
                array_push($attendanceLogs,$current_user);
                $toggle_class = 0;
            }
        }
        else{
            //Throw error or something
        }
        return view('attendance',compact('attendanceLogs'));
    }

    public function arrive(){
        $user_id = Auth::user()->id;
        $arrive = Attendance::where(['user_id' => $user_id])->whereRaw('date(created_at) = ?', [Carbon::today()])->get()->toArray();

        if(empty($arrive)){
            $message['status'] = "ok";
            $message['message'] = 'Welcome to work Trail Analytics Today!';
            $log = new Attendance();
            $log->user_id = $user_id;
            $log->save();
            return $message;
        }
        else{
            $message['status'] = "ok";
            $message['message'] = 'You signed in today!';
            return $message;
        }
    }

    public function depart(){
        $user_id = Auth::user()->id;
        $arrive = Attendance::where(['user_id' => $user_id])->whereRaw('date(created_at) = ?', [Carbon::today()])->get()->toArray();
        $record = Attendance::find($arrive[0]['id']);
        if($record->created_at == $record->updated_at){
            $record->out = true;
            if($record->save()){
                $message['status'] = "ok";
                $message['message'] = 'Thank you for coming today, Looking forward to an exciting tomorrow!';
                return $message;
            }
        }
        else{
            $message['status'] = "ok";
            $message['message'] = 'You already logged out!';
            return $message;
        }


    }

}
