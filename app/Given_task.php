<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Given_task extends Model
{

    protected $fillable = [
        'homework_id', 'theme', 'task', 'answer', 'standard', 'correct_flag'
    ];

    public function store($data, $homework_id)
    {

        $newGivenTask = [
            'homework_id' => $homework_id,
            'theme' => $data['theme'],
            'task' => $data['task'],
            'standard' => $data['answer']
        ];
        $this->fill($newGivenTask);
        $this->save();
        return $this;
    }

    public function getOne($id)
    {
        $entity = $this->find($id);
        return $entity;
    }

    public function edit($id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }
        $entity = $this->find($id);
        $entity->answer = $data['answer'];

        if ($entity->answer == $entity->standard) {
            $entity->correct_flag = 1;
        } else {
            $entity->correct_flag = NULL;
        }

        $entity->save();
        return $entity;
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'answer' => 'required'
            ],
            [
                'answer.required' => 'Необходимо указать ответ'
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }


    //Eloquent: Relationships

    public function homework()
    {
        return $this->belongsTo('App\Homework');
    }
}
