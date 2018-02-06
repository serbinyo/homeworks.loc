<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Grade;
use Illuminate\Http\Request;

class UseregController extends TeacherController
{
    public function index(Grade $gradeModel)
    {
        $grades = $gradeModel->getAll();
        return view('teacher.usereg', ['title' => 'ЭДЗ. User Registrate',
            'grades' => $grades]);
    }
}
