<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Discipline extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public $timestamps = false;

    public function getAll()
    {
        return $this->orderBy('name')->get();
    }

    public function getOne($id)
    {
        return $this->find($id);
    }

    public function getAllPaginated($num)
    {
        $entities = $this->orderBy('name')->paginate($num);
        return $entities;
    }

    public function store($data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $newDiscipline = [
            'name' => $data['name'],
            'description' => $data['description'],
        ];
        $this->fill($newDiscipline);
        $this->save();
        return $this;
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'name' => [
                    'required',
                    'unique:disciplines'
                ],
            ],
            [
                'name.required' => 'Необходимо указать название предмета',
                'name.unique' => 'Предмет ' . $data['name'] . ' уже есть в списке',
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }


    //Eloquent: Relationships

    public function teachers()
    {
        return $this->hasMany('App\Teacher', 'discipline_id');
    }
}
