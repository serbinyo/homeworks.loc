<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Grade extends Model
{
    protected $fillable = [
        'num', 'char', 'description'
    ];

    public $timestamps = false;

    public function getOne($id)
    {
        return $this->find($id);
    }

    public function getAll()
    {
        return $this->orderBy('num')->orderBy('char')->get();
    }

    public function getAllPaginated($num)
    {
        return $this->orderBy('num')->orderBy('char')->paginate($num);
    }

    public function getTeacherGrades($teacher_id)
    {
        $entities = $this
            ->join('schoolkids', 'grades.id', '=', 'schoolkids.grade_id')
            ->join('homeworks', 'schoolkids.id', '=', 'homeworks.schoolkid_id')
            ->join('teachers', 'homeworks.teacher_id', '=', 'teachers.id')
            ->where('teachers.id', $teacher_id)
            ->select('grades.*')
            ->distinct()
            ->orderBy('grades.num')
            ->orderBy('grades.char')
            ->get();
        return $entities;
    }

    public function store($data)
    {

        $data['char'] = mb_strtoupper($data['char']);

        if ($this
            ->where('num', '=', $data['num'])
            ->where('char', '=', $data['char'])
            ->first()) {
            return ['errors' => [
                'duplicated' => $data['num'] . ' - ' . $data['char'] . ' класс уже есть в списке']
            ];
        };

        if ($err = $this->validate($data)) {
            return $err;
        }

        $newGrade = [
            'num' => $data['num'],
            'char' => $data['char'],
            'description' => $data['description'],
        ];
        $this->fill($newGrade);
        $this->save();
        return $this;
    }

    public function edit($id, $data)
    {
        $data['char'] = mb_strtoupper($data['char']);

        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = $this->find($id);

        $entity->num = $data['num'];
        $entity->char = $data['char'];
        $entity->description = $data['description'];

        $entity->save();
        return $entity;
    }

    public function kill($id)
    {
        $entity = $this->find($id);
        return $entity->delete();
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'num' => 'required|numeric',
                'char' => [
                    'required',
                    'size:1',
                    'regex:/[А-Я]/'
                ],

            ],
            [
                'num.required' => 'Необходимо указать цифру класса',
                'num.numeric' => 'Цифра класса должна быть цифрой',
                'char.required' => 'Необходимо указать букву для класса',
                'char.size' => 'Необходимо указать 1 букву кириллицей',
                'char.regex' => 'Букву необходимо указать Кириллицей',
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    //Eloquent: Relationships

    public function schoolkids()
    {
        return $this->hasMany('App\Schoolkid');
    }
}
