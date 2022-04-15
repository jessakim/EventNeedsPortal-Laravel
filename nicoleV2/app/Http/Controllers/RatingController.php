<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\User;

class RatingController extends Controller
{
    //
    public function rate($user){
        $user_instance = User::find($user);
        return view('admin.users.rate', ['user'=>$user_instance]);
    }
}
