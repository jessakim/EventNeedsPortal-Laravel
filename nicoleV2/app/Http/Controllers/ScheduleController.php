<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ScheduleController extends Controller
{
    //
    public function book($user){
        $user_instance = User::find($user);
        return view('admin.schedules.create', ['user'=>$user_instance]);
    }

    public function bookevent(){
        $schedule_data = request()->validate([
            'booking_title'=> 'required',
            'conntent'=> 'required',
            'event_date'=> 'required',
            'event_time'=> 'required',
            'event_staff_id' => 'required'
        ]);

        //dd($schedule_data);
        auth()->user()->schedules()->create($schedule_data);

        return back();
    }
}
