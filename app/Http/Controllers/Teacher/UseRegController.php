<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Grade;
use Illuminate\Http\Request;

class UseRegController extends TeacherController
{
    public function index(Grade $gradeModel)
    {
        $grades = $gradeModel->orderBy('name')->get();
        return view('teacher.userreg', ['title' => 'ЭДЗ. User Registrate',
            'grades' => $grades]);
    }
}
