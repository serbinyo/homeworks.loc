<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;


class WorktopController extends TeacherController
{
    public function index()
    {
        return view('teacher.worktop', ['title' => 'ЭДЗ. Worktop']);
    }
}
