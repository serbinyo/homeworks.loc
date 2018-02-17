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
        $all_tasks = $task->showAll();
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
        $message = 'Задача добавленна добавлена c номером ' . $new_task_id;
        return redirect('/teacher/tasks/create')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('teacher.tasks.show', ['title' => 'ЭДЗ. Просмотр задачи']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo __METHOD__;
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
        echo __METHOD__;
        dump($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo __METHOD__;
        dump($id);
    }
}
