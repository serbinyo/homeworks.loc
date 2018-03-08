<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
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
        return  $this->find($id);
    }

    public function showAll()
    {
        return $this->orderBy('num')->orderBy('char')->paginate(10);
    }

    //Eloquent: Relationships

    public function schoolkids()
    {
        return $this->hasMany('App\Schoolkid');
    }
}
