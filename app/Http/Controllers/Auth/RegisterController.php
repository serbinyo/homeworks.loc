<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/admin/register/redirect-to-main-page-after-registration';

//    protected function redirectTo()
//    {
//        //
//    }

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'role' => 'required',
                'login' => 'required|string|max:255|unique:users',
                'email' => 'nullable|email|max:255|unique:users',
                'firstname' => 'required|string|max:255',
                'middlename' => 'max:255',
                'lastname' => 'required|string|max:255',
                'password' => 'required|string|min:6|confirmed',
            ],
            [
                'email.unique' => 'Почта занята',
                'login.unique' => 'Логин занят',
                'firstname.required' => 'Необходимо указать имя',
                'firstname.max' => 'Поле не должно быть больше 255 символов',
                'middlename.max' => 'Поле не должно быть больше 255 символов',
                'lastname.required' => 'Необходимо указать фамилию',
                'lastname.max' => 'Поле не должно быть больше 255 символов',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        if ($data['role'] == 's') {
            $entity = User::create([
                'role' => $data['role'],
                'login' => $data['login'],
                'password' => bcrypt($data['password']),
            ])->schoolkid()->create([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'grade_id' => $data['grade'],
            ]);
            DB::commit();
            return $entity;
        } elseif ($data['role'] == 't') {
            $entity = User::create([
                'role' => $data['role'],
                'login' => $data['login'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ])->teacher()->create([
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'discipline_id' => $data['discipline']
            ]);
            DB::commit();
            return $entity;
        } else {
            dd('Неизвестная роль');
        }
    }
}
