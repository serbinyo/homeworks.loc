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

    public function getAll()
    {
        return $this->orderBy('num')->orderBy('char')->get();
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

    public function getOne($id)
    {
        return $this->find($id);
    }

    public function showAll()
    {
        return $this->orderBy('num')->orderBy('char')->paginate(10);
    }

    public function store($data)
    {
        $data['char'] = mb_strtoupper($data['char']);

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

    public function validate($data)
    {
        if ($this
            ->where('num', '=', $data['num'])
            ->where('char', '=', $data['char'])
            ->first()) {
            return ['errors' => [
                'duplicated' => $data['num'] . ' - ' . $data['char'] . ' класс уже есть в списке']
            ];
        };

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
