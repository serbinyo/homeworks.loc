<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'discipline_id'
    ];

    public function getOne($id)
    {
        $entity = $this->find($id);
        return $entity;
    }

    public function getFIO($id)
    {
        $teacher = $this->find($id);
        $fio = $teacher->firstname . ' '
            . $teacher->middlename . ' '
            . $teacher->lastname;
        return $fio;
    }

    public function edit($id, $data)
    {
        $entity = $this->find($id);

        if ($err = $this->validate($data, $entity->user->id)) {
            return $err;
        }

        DB::beginTransaction();

        $entity->user->email = $data['email'];

        $email_is_change = $entity->user->isDirty('email');

        $entity->user->save();

        $entity->firstname = $data['firstname'];
        $entity->middlename = $data['middlename'];
        $entity->lastname = $data['lastname'];

        $data_is_change = $entity->isDirty();

        $entity->save();

        DB::commit();

        if ($email_is_change || $data_is_change) {
            return $entity;
        } else {
            return ['errors' => ['no_chenge' => 'Изменений нет']];
        }
    }

    public function validate($data, $id)
    {
        $validator = Validator::make($data,
            [
                'email' =>
                    [
                        'nullable',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore($id)
                    ],
                'firstname' => 'required|string|max:255',
                'middlename' => 'max:255',
                'lastname' => 'required|string|max:255'
            ],
            [
                'email.unique' => 'Новая почта занята'
                //todo прописать ошибки валидации на русском
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function change_password($id, $data)
    {
        $entity = $this->find($id);

        if ($err = $this->validate_password($data)) {
            return $err;
        }

        if (Hash::check($data['password'], $entity->user->password)) {
            $entity->user->password = Hash::make($data['password-new']);
            $entity->user->save();
            return $entity;
        }
        return ['errors' => ['password' => 'Неправильный пароль']];
    }

    public function validate_password($data)
    {
        $validator = Validator::make($data,
            [
                'password' => 'required|string|min:6',
                'password-new' => 'required|string|min:6|confirmed',
            ],
            [
                'password.required' => 'Укажите пароль',
                'password.min' => 'Пароль должен содержать как минимум 6 символов',
                'password-new.required' => 'Укажите новый пароль',
                'password-new.min' => 'Пароль должен содержать как минимум 6 символов',
                'password-new.confirmed' => 'Новый пароль и подтверждение пароля не совпадают',
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function kill($id)
    {
        $entity = $this->find($id);
        DB::beginTransaction();

        $entity->user()->delete();
        $entity->delete();

        DB::commit();
    }

    //Eloquent: Relationships

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }

    public function works()
    {
        return $this->hasMany('App\Work');
    }
}
