<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;

class DesktopController extends TeacherController
{
    public function index()
    {
        return view('teacher.desktop', [
            'title' => 'ЭДЗ. TeacherDesktop',
            'teacher' => $this->user->teacher,
            'discipline' => $this->user->teacher->discipline->name
        ]);
    }
}
