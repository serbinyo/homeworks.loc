<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;

class UseregController extends TeacherController
{
    public function index()
    {
        return view('teacher.usereg', ['title' => 'ЭДЗ. User Registrate']);
    }
}
