<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;

class SetHomeworkController extends TeacherController
{
    public function create(Request $request)
    {
        $data = $request->except('_token');
        return view('teacher.sethomework', ['title' => 'ЭДЗ. Создать ДЗ', 'id' => $data['id']]);
    }
}
