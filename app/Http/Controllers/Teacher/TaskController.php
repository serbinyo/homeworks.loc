<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        $all_tasks = $task->getAllPaginated();
        return view('teacher.tasks', ['title' => 'ЭДЗ. Задачи', 'tasks' => $all_tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.tasks.create', ['title' => 'ЭДЗ. Новая задача']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $data = $request->except('_token');
        $response = $task->store($data, $this->teacher->getAuthIdentifier());

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $new_task_id = $response->id;
        $message = 'Задача добавлена под номером ' . $new_task_id;
        return redirect('/teacher/tasks')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = new Task();
        $task_to_show = $task->getOne($id);
        return view('teacher.tasks.show', [
            'title' => 'ЭДЗ. Просмотр задачи',
            'task' => $task_to_show,
            'teacher' => $this->teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = new Task();
        $task_to_update = $task->getOne($id);
        return view('teacher.tasks.edit', [
            'title' => 'ЭДЗ. Редактирование задачи',
            'task_to_update'=>$task_to_update
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $task = new Task();
        $response = $task->edit($id, $this->teacher->getAuthIdentifier(), $data);

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $message = 'Задача под номером ' . $id . ' обновлена';
        return redirect('/teacher/tasks/' . $id)->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = new Task();
        $task->kill($id);
        $message = 'Задача ' . $id . ' удалена!';
        return redirect('/teacher/tasks')->with('status', $message);
    }
}
