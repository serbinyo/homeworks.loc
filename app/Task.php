<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Task extends Model
{
    protected $fillable = [
        'teachers_id', 'theme', 'task', 'answer'
    ];

    public function getAllPaginated()
    {
        $entities = Task::orderBy('id', 'desc')->paginate(10);
        return $entities;
    }

    public function getOne($id)
    {
        $entity = Task::find($id);
        return $entity;
    }

    public function store($data, $teachers_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
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

    public function edit($id, $teacher_id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = Task::find($id);

        $entity->teachers_id = $teacher_id;
        $entity->theme = $data['theme'];
        $entity->task = $data['task'];
        $entity->answer = $data['answer'];

        $entity->save();
        return $entity;
    }

    public function validate($data)
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

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function kill($id)
    {
        $entity = Task::find($id);
        return $entity->delete();
    }
}
