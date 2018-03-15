<?php

namespace App\Http\Controllers\Teacher\Homework;

use App\Http\Controllers\TeacherController;
use App\Grade;
use App\Homework;

class TchrChoiceController extends TeacherController
{
    //todo сделать валидацию для всех GET запросов.
    public function index(Grade $grade)
    {
        $grades_to_show = $grade->getTeacherGrades($this->user->teacher->id)->all();

        return view('teacher.homeworks', [
            'title' => 'Выбор класса',
            'grades' => $grades_to_show
        ]);
    }

    public function show_dates($grade_id)
    {
        $homework = new Homework();
        $homework_dates = $homework->getTeacherGradeDates($this->user->teacher->id, $grade_id);

        return view('teacher.homework.calendar', [
            'title' => 'Выбор даты',
            'grade_id' => $grade_id,
            'dates' => $homework_dates
        ]);
    }

    public function show_homeworks($grade_id, $date)
    {
        $homework = new Homework();
        $homeworks_to_show = $homework->getByDateForTeacher($this->user->teacher->id, $grade_id, $date);

        return view('teacher.homework.homework_kids', [
            'title' => 'Домашние задания',
            'grade_id' => $grade_id,
            'date' => $date,
            'homeworks' => $homeworks_to_show
        ]);
    }
}
