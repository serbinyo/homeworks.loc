<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Grade;
use Illuminate\Http\Request;

class UseRegController extends TeacherController
{
    public function index(Grade $gradeModel)
    {
        $grades = $gradeModel->getAll();
        return view('teacher.userreg', ['title' => 'ЭДЗ. Регистация ученика',
            'grades' => $grades]);
    }
}
