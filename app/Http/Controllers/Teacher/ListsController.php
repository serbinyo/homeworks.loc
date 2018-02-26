<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;

class ListsController extends TeacherController
{
    public function index()
    {
        return view('teacher.lists', [
            'title' => 'ЭДЗ. Списки'
        ]);
    }
}
