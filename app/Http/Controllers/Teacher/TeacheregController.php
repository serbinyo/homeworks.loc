<?php

namespace App\Http\Controllers\Teacher;


use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;

class TeacheregController extends TeacherController
{
    public function index()
    {
        return view('teacher.teachereg', ['title' => 'ЭДЗ. Teacher Registrate']);
    }
}
