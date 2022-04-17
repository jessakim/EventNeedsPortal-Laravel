<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $admins = User::where('usertype', 'Admin')->get()->count();
        $clients = User::where('usertype', 'Client')->get()->count();
        $staffs = User::where('usertype', 'Event Staff')->where('approved', '1')->get()->count();
        $eorgs = User::where('stafftype', 'LIKE', '%'. 'Event Organizer' .'%')->where('approved', '1')->get()->count();
        $hosts = User::where('stafftype', 'LIKE', '%'. 'Host' .'%')->where('approved', '1')->get()->count();
        $eplaces = User::where('stafftype', 'LIKE', '%'. 'Event Place' .'%')->where('approved', '1')->get()->count();
        $foods = User::where('stafftype', 'LIKE', '%'. 'Foods' .'%')->where('approved', '1')->get()->count();
        $etainers = User::where('stafftype', 'LIKE', '%'. 'Entertainer' .'%')->where('approved', '1')->get()->count();
        $lands = User::where('stafftype', 'LIKE', '%'. 'Light and Sounds' .'%')->where('approved', '1')->get()->count();
        $iands = User::where('stafftype', 'LIKE', '%'. 'Invitation and Stationary' .'%')->where('approved', '1')->get()->count();
        $vandp = User::where('stafftype', 'LIKE', '%'. 'Video and Photography' .'%')->where('approved', '1')->get()->count();
        $decors = User::where('stafftype', 'LIKE', '%'. 'Decorations' .'%')->where('approved', '1')->get()->count();


        return view('admin.index', ['user'=>auth()->user(), 'admins'=>$admins,
                                                            'clients'=>$clients,
                                                            'staffs'=>$staffs,
                                                            'eorgs'=>$eorgs,
                                                            'hosts'=>$hosts,
                                                            'eplaces'=>$eplaces,
                                                            'foods'=>$foods,
                                                            'etainers'=>$etainers,
                                                            'lands'=>$lands,
                                                            'iands'=>$iands,
                                                            'vandp'=>$vandp,
                                                            'decors'=>$decors]);
    }
}
