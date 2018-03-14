<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Given_test extends Model
{
    protected $fillable = [
        'homework_id', 'theme', 'task', 'option_a', 'option_b', 'option_c', 'option_d', 'answer', 'standard', 'correct_flag'
    ];

    public function store($standard_test, $homework_id)
    {
        $newGivenTest = [
            'homework_id' => $homework_id,
            'theme' => $standard_test['theme'],
            'task' => $standard_test['task'],
            'option_a' => $standard_test['option_a'],
            'option_b' => $standard_test['option_b'],
            'option_c' => $standard_test['option_c'],
            'option_d' => $standard_test['option_d'],
            'standard' => $standard_test['answer']
        ];
        $this->fill($newGivenTest);
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
