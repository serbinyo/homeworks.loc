<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Work extends Model
{
    protected $fillable = [
        'teacher_id', 'theme'
    ];

    public function getAllPaginated()
    {
        $entities = Work::orderBy('id', 'desc')->paginate(10);
        return $entities;
    }

    public function getOne($id)
    {
        $entity = Work::find($id);
        return $entity;
    }

    public function store($data, $teacher_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $newWork = [
            'teacher_id' => $teacher_id,
            'theme' => $data['theme'],
        ];
        $this->fill($newWork);
        $this->save();
        return $this;
    }

    public function edit($id, $user_id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = Work::find($id);

        $entity->teacher_id = $user_id;
        $entity->theme = $data['theme'];

        $entity->save();
        return $entity;
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'theme' => 'required',
            ],
            [
                'theme.required' => 'Необходимо указать тему',
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function kill($id)
    {
        $entity = Work::find($id);
        return $entity->delete();
    }
}
