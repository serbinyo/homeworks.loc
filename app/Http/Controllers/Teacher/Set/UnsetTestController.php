<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Test;
use App\Work;
use Illuminate\Http\Request;

class UnsetTestController extends TeacherController
{
    public function __invoke(Request $request, Test $test, Work $work)
    {
        $data = $request->except('_token');
        $test = $test->getOne($data['test_id']);
        $work = $work->getOne($data['work_id']);
        $test->works()->detach($work);
        $message = 'Тест откреплен от работы';
        return back()->with('status', $message);
    }
//    }
}
