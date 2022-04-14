<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Schedule;
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

        Session::flash('scheduleCreated', 'Event Schedule created successfully');

        return back();
    }

    public function index($book_type){
        if ($book_type == "approved") {
            $schedules = Schedule::where('approved', 1)->get();;
        } elseif($book_type == "unapproved"){
            $schedules = Schedule::where('approved', 0)->get();
        } elseif ($book_type == "esapproved") {
            $schedules = Schedule::where('approved', 1)->where('event_staff_id', auth()->user()->id)->get();
        } elseif ($book_type == "esunapproved") {
            $schedules = Schedule::where('approved', 0)->where('event_staff_id', auth()->user()->id)->get();
        } elseif ($book_type == "capproved") {
            $schedules = Schedule::where('approved', 1)->where('user_id', auth()->user()->id)->get();
        } elseif ($book_type == "cunapproved") {
            $schedules = Schedule::where('approved', 0)->where('user_id', auth()->user()->id)->get();
        }

        return view('admin.schedules.index', ['schedules'=>$schedules]);
    }

    public function approve(Schedule $schedule){
        $schedule->update(['approved'=>1]);

        Session::flash('scheduleApproved', 'Event Schedule approved successfully');

        return back();
    }
}
