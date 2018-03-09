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

    public function getTeacherDates($teacher_id, $grade_id)
    {
        $entities = $this
            ->join('teachers', 'homeworks.teacher_id', '=', 'teachers.id')
            ->join('schoolkids', 'homeworks.schoolkid_id', '=', 'schoolkids.id')
            ->join('grades', 'schoolkids.grade_id', '=', 'grades.id')
            ->where('homeworks.teacher_id', $teacher_id)
            ->where('grades.id', $grade_id)
            ->select('homeworks.date_to_completion')
            ->distinct()
            ->paginate(15);

        return $entities;
    }

    public function getByDate($teacher_id, $grade_id, $date)
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
