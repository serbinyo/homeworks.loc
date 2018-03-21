<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
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

    public function edit($id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = $this->find($id);

        $entity->name = $data['name'];
        $entity->description = $data['description'];

        $entity->save();
        return $entity;
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'name' => [
                    'required',
                    Rule::unique('disciplines')->ignore($data['id'])
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

    public function kill($id)
    {
        $entity = $this->find($id);
        return $entity->delete();
    }

    //Eloquent: Relationships

    public function teachers()
    {
        return $this->hasMany('App\Teacher', 'discipline_id');
    }
}
