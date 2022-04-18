<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\User;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
{
    //
    public function rate($user){
        $user_instance = User::find($user);
        return view('admin.users.rate', ['user'=>$user_instance]);
    }

    public function saverate(){
        $rating_data = request()->validate([
            'rate'=> 'required',
            'feedback'=> 'required',
            'event_staff_id' => 'required'
        ]);

        auth()->user()->ratings()->create($rating_data);

        Session::flash('rateCreated', 'Rating and Feedback created successfully');

        return back();
    }

    public function index($user_type){
        if ($user_type == "view") {
            $ratings = Rating::all();

        } elseif($user_type == "eventsupplier"){
            $ratings = Rating::where('event_staff_id', auth()->user()->id)->get();

        }

        return view('admin.rating.index', ['ratings'=>$ratings]);
    }
}
