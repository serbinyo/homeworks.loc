<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;


class ClassroomsController extends TeacherController
{
    public function index()
    {
        return view('teacher.classrooms', ['title' => 'ЭДЗ. Classrooms']);
    }
}
