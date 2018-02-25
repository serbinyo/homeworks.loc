<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Task;
use App\Work;
use Illuminate\Http\Request;

class SetTaskController extends TeacherController
{
    public function __invoke(Request $request, Task $task, Work $work)
    {
        $data = $request->except('_token');
        $task = $task->getOne($data['task_id']);
        $work = $work->getOne($data['work_id']);


        $hasTask = $work->tasks()->where('task_id', $data['task_id'])->exists();
        if ($hasTask) {
            $message = 'Задача уже добавлена в работу №: ' . $data['work_id'];
            return redirect('/teacher/tasks')->withErrors($message);
        } else {
            $work->tasks()->attach($task);
            $message = 'Задача добавлена к работе №: ' . $data['work_id'];
            return redirect('/teacher/tasks')->with('status', $message);
        }
    }
}
