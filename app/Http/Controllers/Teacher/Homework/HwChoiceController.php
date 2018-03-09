<?php

namespace App\Http\Controllers\Teacher\Homework;

use App\Http\Controllers\TeacherController;
use App\Grade;
use App\Homework;
use App\Schoolkid;
use App\Work;

class HwChoiceController extends TeacherController
{
    //todo сделать валидацию для всех GET запросов.
    public function index(Grade $grade)
    {
        $grades_to_show = $grade->getTeacherGrades($this->user->teacher->id);

        return view('teacher.homeworks', [
            'grades' => $grades_to_show
        ]);
    }

    public function show_dates($grade_id)
    {
        $homework = new Homework();
        $homework_dates = $homework->getTeacherDates($this->user->teacher->id, $grade_id);

        return view('teacher.homework.calendar', [
            'grade_id' => $grade_id,
            'dates' => $homework_dates
        ]);
    }

    public function show_works($grade_id, $date)
    {
        $homework = new Homework();
        $homeworks_to_show = $homework->getByDate($this->user->teacher->id, $grade_id, $date);

        return view('teacher.homework.homework_kids', [
            'grade_id' => $grade_id,
            'date' => $date,
            'homeworks' => $homeworks_to_show
        ]);
    }
}
