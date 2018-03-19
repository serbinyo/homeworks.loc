<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Homework extends Model
{
    protected $fillable = [
        'computer_mark', 'teacher_comment', 'teacher_mark'
    ];

    public function getOne($id)
    {
        $entity = $this->find($id);
        return $entity;
    }

    public function getTeacherGradeDates($teacher_id, $grade_id)
    {
        $entities = $this
            ->join('teachers', 'homeworks.teacher_id', '=', 'teachers.id')
            ->join('schoolkids', 'homeworks.schoolkid_id', '=', 'schoolkids.id')
            ->join('grades', 'schoolkids.grade_id', '=', 'grades.id')
            ->where('homeworks.teacher_id', $teacher_id)
            ->where('grades.id', $grade_id)
            ->select('homeworks.date_to_completion')
            ->orderBy('date_to_completion', 'desc')
            ->distinct()
            ->paginate(15);

        return $entities;
    }

    public function getByDateForTeacher($teacher_id, $grade_id, $date)
    {
        $entities = $this
            ->join('works', 'homeworks.work_id', '=', 'works.id')
            ->join('schoolkids', 'homeworks.schoolkid_id', '=', 'schoolkids.id')
            ->join('grades', 'schoolkids.grade_id', '=', 'grades.id')
            ->where('homeworks.teacher_id', $teacher_id)
            ->where('date_to_completion', $date)
            ->where('grades.id', $grade_id)
            ->select('homeworks.*')
            ->get();
        return $entities;
    }

    public function getKidDisciplineDates($schoolkid_id, $discipline_id)
    {
        $entities = $this
            ->join('works', 'homeworks.work_id', '=', 'works.id')
            ->join('teachers', 'works.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('homeworks.schoolkid_id', $schoolkid_id)
            ->where('disciplines.id', $discipline_id)
            ->select('homeworks.date_to_completion')
            ->orderBy('date_to_completion', 'desc')
            ->distinct()
            ->paginate(15);

        return $entities;
    }

    public function getByDateForKid($schoolkid_id, $discipline_id, $date)
    {
        $entities = $this
            ->join('works', 'homeworks.work_id', '=', 'works.id')
            ->join('teachers', 'works.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('homeworks.schoolkid_id', $schoolkid_id)
            ->where('date_to_completion', $date)
            ->where('disciplines.id', $discipline_id)
            ->select('homeworks.*')
            ->get();
        return $entities;
    }

    public function evaluate($id, $mark)
    {
        $entity = $this->find($id);

        if ($mark != 0) {
            $entity->computer_mark = $mark;
        } else {
            $entity->computer_mark = 1;
        }
        $entity->date_of_completion = date('Y-m-d');
        $entity->save();
        return $entity;
    }

    public function percent_per_character($percent)
    {
        if ($percent > 100 || $percent < 0)
            return null;
        if ($percent == 100)
            $char = '5+';
        else if ($percent >= 90 && $percent <= 99)
            $char = '5';
        else if ($percent >= 85 && $percent <= 89)
            $char = '5-';
        else if ($percent >= 70 && $percent <= 84)
            $char = '4';
        else if ($percent >= 65 && $percent <= 69)
            $char = '4-';
        else if ($percent >= 50 && $percent <= 64)
            $char = '3';
        else if ($percent >= 45 && $percent <= 49)
            $char = '3-';
        else if ($percent >= 30 && $percent <= 44)
            $char = '2';
        else if ($percent >= 1 && $percent <= 29)
            $char = '2-';
        else
            $char = '1';
        return $char;
    }

    public function edit_mark($id, $data)
    {
        if ($err = $this->validate_mark($data)) {
            return $err;
        }
        $entity = $this->find($id);

        $entity->teacher_comment = $data['teacher_comment'];

        if (!empty($data['teacher_mark'])) {
            $entity->teacher_mark = $data['teacher_mark'];
        }

        $entity->save();
        return $entity;
    }

    public function validate_mark($data)
    {
        $validator = Validator::make($data,
            [
                'teacher_comment' => 'required',
                'teacher_mark' => 'integer|min:10|max:100',
            ],
            [
                'teacher_comment.required' => 'Напишите пару слов',
                'teacher_mark.integer' => 'Оценка должна быть целым числом',
                'teacher_mark.min' => 'Оценка не должна быть меньше 1 процента',
                'teacher_mark.max' => 'Оценка не должна быть больше 100 процентов',
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function clear_marks($id)
    {
        $entity = $this->find($id);

        $entity->computer_mark = NULL;
        $entity->teacher_comment = NULL;
        $entity->teacher_mark = NULL;

        $entity->save();
        return $entity;
    }


    //Eloquent: Relationships

    public function schoolkid()
    {
        return $this->belongsTo('App\Schoolkid');
    }

    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    public function given_tasks()
    {
        return $this->HasMany('App\Given_task');
    }

    public function given_tests()
    {
        return $this->HasMany('App\Given_test');
    }
}
