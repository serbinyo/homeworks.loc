<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        if ($percent == 100)
            $char = '5+';
        else if ($percent >= 93 && $percent <= 99)
            $char = '5';
        else if ($percent >= 85 && $percent <= 92)
            $char = '4';
        else if ($percent >= 77 && $percent <= 84)
            $char = '4-';
        else if ($percent >= 70 && $percent <= 76)
            $char = '3+';
        else if ($percent >= 63 && $percent <= 69)
            $char = '3';
        else if ($percent >= 50 && $percent <= 62)
            $char = '3-';
        else if ($percent >= 1 && $percent <= 49)
            $char = '2';
        else
            $char = '1';
        return $char;
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
