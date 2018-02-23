<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Test;
use App\Work;
use Illuminate\Http\Request;

class SetTestController extends TeacherController
{

    public function set(Request $request, Test $test, Work $work)
    {
        $data = $request->except('_token');
        $test = $test->getOne($data['test_id']);
        $work = $work->getOne($data['work_id']);

        $hasTask = $work->tests()->where('id', $data['test_id'])->exists();
        if ($hasTask) {
            $message = 'Тест уже добавлен в задание №: ' . $data['work_id'];
            return redirect('/teacher/tests')->withErrors($message);
        } else {
            $work->tests()->attach($test);
            $message = 'Тест добавлен к заданию №: ' . $data['work_id'];
            return redirect('/teacher/tests')->with('status', $message);
        }
    }
}
