<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Discipline;
use Illuminate\Http\Request;

class TeacheregController extends TeacherController
{
    public function index(Discipline $disciplineModel)
    {
        $disciplines = $disciplineModel->getAll();
        return view('teacher.teachereg', ['title' => 'ЭДЗ. Teacher Registrate',
            'disciplines' => $disciplines]);
    }
}
