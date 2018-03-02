<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
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
        $entity = self::find($id);
        return $entity;
    }

    public function getFIO($id)
    {
        $teacher = self::find($id);
        $fio = $teacher->firstname . ' '
            . $teacher->middlename . ' '
            . $teacher->lastname;
        return $fio;
    }

    public function edit($id, $data)
    {
        $entity = self::find($id);
        if ($err = $this->validate($data, $entity->user->id)) {
            return $err;
        }
        DB::beginTransaction();
        $entity->user->update([
            'email' => $data['email']
        ]);
        //        $entity->firstname = $data['firstname'];
        //        $entity->middlename = $data['middlename'];
        //        $entity->lastname = $data['lastname'];
        //        $entity->save();
        $entity->update([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
        ]);
        DB::commit();

        return $entity;
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

    public function kill($id)
    {
        $entity = self::find($id);
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
