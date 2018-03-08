<?php

namespace App\Http\Controllers\Teacher\Homework;

use App\Http\Controllers\TeacherController;
use App\Grade;
use App\Homework;
use App\Schoolkid;

class HwChoiceController extends TeacherController
{
    public function index(Grade $grade)
    {
        $grades_to_show = $grade->getTeacherGrades($this->user->teacher->id);

        return view('teacher.homeworks', [
            'grades' => $grades_to_show
        ]);
    }

    public function show_homeworks($grade_id)
    {
        $homework = new Homework();
        $homework_dates = $homework->getTeacherDates($this->user->teacher->id, $grade_id);
        dd($homework_dates);
    }
}
