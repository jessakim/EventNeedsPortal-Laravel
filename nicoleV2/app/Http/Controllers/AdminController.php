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
        $staffs = User::where('usertype', 'Event Supplier')->where('approved', '1')->get()->count();
        $eorgs = User::where('stafftype', 'LIKE', '%'. 'Organizer' .'%')->where('approved', '1')->get()->count();
        $hosts = User::where('stafftype', 'LIKE', '%'. 'Host' .'%')->where('approved', '1')->get()->count();
        $eplaces = User::where('stafftype', 'LIKE', '%'. 'Venue' .'%')->where('approved', '1')->get()->count();
        $foods = User::where('stafftype', 'LIKE', '%'. 'Foods and Beverages' .'%')->where('approved', '1')->get()->count();
        $etainers = User::where('stafftype', 'LIKE', '%'. 'Entertainer' .'%')->where('approved', '1')->get()->count();
        $lands = User::where('stafftype', 'LIKE', '%'. 'Lights and Sounds' .'%')->where('approved', '1')->get()->count();
        $iands = User::where('stafftype', 'LIKE', '%'. 'Invitations and Stationary' .'%')->where('approved', '1')->get()->count();
        $vandp = User::where('stafftype', 'LIKE', '%'. 'Photographers and Artists' .'%')->where('approved', '1')->get()->count();
        $decors = User::where('stafftype', 'LIKE', '%'. 'Equipments and Decorations' .'%')->where('approved', '1')->get()->count();


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
