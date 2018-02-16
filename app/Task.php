<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Task extends Model
{
    protected $fillable = [
        'teachers_id', 'theme', 'task', 'answer'
    ];

    public function store($data, $teachers_id)
    {
        $validator = Validator::make($data,
            [
                'theme' => 'required',
                'task' => 'required',
                'answer' => 'required'
            ],
            [
                'theme.required' => 'Необходимо указать тему',
                'task.required' => 'Необходимо указать задание',
                'answer.required' => 'Необходимо указать ответ'
            ]);
        if ($validator->fails())
        {
            return ['errors' => $validator->errors()];
        }
        $newTask = [
            'teachers_id' => $teachers_id,
            'theme' => $data['theme'],
            'task' => $data['task'],
            'answer' => $data['answer']
        ];
        $this->fill($newTask);
        $this->save();
        return $this;
    }
}
