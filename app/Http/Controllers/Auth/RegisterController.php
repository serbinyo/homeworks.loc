<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/teacher/classrooms';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
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
//            'name' => 'required|string|max:255',
            'role' => 'required',
            'login' => 'required|string|max:255|unique:users',
//            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        if ($data['role']=='s')
        {
            return User::create([
                'role' => $data['role'],
                'login' => $data['login'],
                'password' => bcrypt($data['password']),
            ])->schoolkid()->create([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'grades_id' => $data['grade'],
            ]);
        }
        elseif ($data['role']=='t')
        {
            return User::create([
                'role' => $data['role'],
                'login' => $data['login'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ])->teacher()->create([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'disciplines_id' => $data['discipline']
            ]);
        }
        else
        {
            dd('Неизвестная роль');
        }
    }
}
