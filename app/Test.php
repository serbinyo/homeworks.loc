<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;


class Test extends Model
{
    protected $fillable = [
        'teacher_id', 'theme', 'task', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'
    ];

    public function getAllPaginated()
    {
        $entities = $this->orderBy('id', 'desc')->paginate(10);
        return $entities;
    }

    public function getDisciplineTestsPaginated($discipline_id)
    {
        $entities = $this->join('teachers', 'tests.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('disciplines.id', $discipline_id)
            ->select('tests.*')
            ->orderBy('tests.id', 'desc')
            ->paginate(10);
        return $entities;
    }

    public function getOne($id)
    {
        $entity = $this->find($id);
        return $entity;
    }

    public function store($data, $teacher_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $newTest = [
            'teacher_id' => $teacher_id,
            'theme' => $data['theme'],
            'task' => $data['task'],
            'option_a' => $data['option_a'],
            'option_b' => $data['option_b'],
            'option_c' => $data['option_c'],
            'option_d' => $data['option_d'],
            'answer' => $data['answer']
        ];
        $this->fill($newTest);
        $this->save();
        return $this;
    }

    public function edit($id, $teacher_id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = $this->find($id);

        $entity->teacher_id = $teacher_id;
        $entity->theme = $data['theme'];
        $entity->task = $data['task'];
        $entity->option_a = $data['option_a'];
        $entity->option_b = $data['option_b'];
        $entity->option_c = $data['option_c'];
        $entity->option_d = $data['option_d'];
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
                'option_a' => 'required',
                'option_b' => 'required',
                'option_c' => 'required',
                'option_d' => 'required',
                'answer' => 'required'
            ],
            [
                'theme.required' => 'Необходимо указать тему',
                'task.required' => 'Необходимо указать вопрос',
                'option_a.required' => 'Необходимо указать ответ A',
                'option_b.required' => 'Необходимо указать ответ B',
                'option_c.required' => 'Необходимо указать ответ C',
                'option_d.required' => 'Необходимо указать ответ D',
                'answer.required' => 'Необходимо указать ответ',
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

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function works()
    {
        return $this->belongsToMany('App\Work');
    }
}
