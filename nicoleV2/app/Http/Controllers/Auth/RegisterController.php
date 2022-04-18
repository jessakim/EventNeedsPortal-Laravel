<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usertype' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['stafftype'] == "Select which Event Supplier you are"){
            $stafftype = $data['usertype'];
        } else{
            $stafftype = $data['stafftype'] . ' ' . $data['specify'];
        }

        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'address' => $data['address'],
            'stafftype' => $stafftype,
            'fee' => $data['fee'],
            'usertype' => $data["username"],
            'contact' => $data['contact']
        ]);


        $role = Role::where('name', $data['usertype'])->first();
        //if ($data['usertype'] == "Client") {
            //$role = new Role(['name' => 3]);
        //}
        //elseif ($data['usertype'] == "Event Staff") {
           // $role = where
        //}

        $user->roles()->save($role);
        return $user;
    }
}
