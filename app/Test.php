<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Test extends Model
{
    protected $fillable = [
        'teachers_id', 'theme', 'task', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'
    ];

    public function store($data, $teachers_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $newMaterial = [
            'teachers_id' => $teachers_id,
            'theme' => $data['theme'],
            'task' => $data['task'],
            'option_a' => $data['option_a'],
            'option_b' => $data['option_b'],
            'option_c' => $data['option_c'],
            'option_d' => $data['option_d'],
            'answer' => $data['answer']
        ];
        $this->fill($newMaterial);
        $this->save();
        return $this;
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
            return ['errors' => $validator->errors()->all()];
        }
    }

    public function kill($id)
    {
        $entity = self::find($id);
        $entity->delete();
    }
}
