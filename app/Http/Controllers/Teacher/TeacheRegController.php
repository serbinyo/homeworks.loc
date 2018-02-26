<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Discipline;
use Illuminate\Http\Request;

class TeacheRegController extends TeacherController
{
    public function index(Discipline $disciplineModel)
    {
        $disciplines = $disciplineModel->orderBy('name')->get();
        return view('teacher.teacherreg', ['title' => 'ЭДЗ. Teacher Registrate',
            'disciplines' => $disciplines]);
    }
}
