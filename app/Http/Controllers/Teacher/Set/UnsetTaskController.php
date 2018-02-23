<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Task;
use App\Work;
use Illuminate\Http\Request;

class UnsetTaskController extends TeacherController
{
    public function __invoke(Request $request, Task $task, Work $work)
    {
        $data = $request->except('_token');
        $task = $task->getOne($data['task_id']);
        $work = $work->getOne($data['work_id']);
        $task->works()->detach($work);
        $message = 'Задача откреплена от работы';
        return back()->with('status', $message);
    }
}
