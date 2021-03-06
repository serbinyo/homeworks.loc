<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Work;
use Illuminate\Http\Request;
use App\Task;
use App\Teacher;

class TaskController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task, Teacher $author)
    {

        $discipline_id = $this->user->teacher->discipline_id;
        $all_tasks = $task->getDisciplineTasksPaginated($discipline_id);

        //$all_tasks = Task::with(['teacher', 'teacher.discipline'])->where([0],1)->paginate(10);
        //dump($all_tasks);

        //$discipline = Discipline::with(['teachers', 'teachers.tasks'])->where('id', $discipline_id)->paginate(10);
        //$all_tasks = $discipline[0]->teachers[0]->tasks;

        //$discipline->each(function ($item, $key) {
        //dump($item . ' -> ' . $key);
        //});


        //$all_tasks = $task->getAllPaginated();
        return view('teacher.tasks', [
            'title' => 'ЭДЗ. Задачи',
            'tasks' => $all_tasks,
            'author' => $author
        ]);
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
        $response = $task->store($data, $this->user->teacher->id);

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

        if ($this->user->can('view', $task_to_show)) {

            $work = new Work();
            $teacher_id = $this->user->teacher->id;
            $teacher_works = $work->getTeacherWorks($teacher_id);

            $author = new Teacher();
            $author_fio = $author->getFIO($task_to_show->teacher_id);

            return view('teacher.tasks.show', [
                'title' => 'ЭДЗ. Просмотр задачи',
                'task' => $task_to_show,
                'teacher' => $this->user->teacher,
                'author_fio' => $author_fio,
                'works' => $teacher_works
            ]);
        }
        $message = 'ОШИБКА. Нет права просмотра !!!';
        return redirect('/teacher/tasks/')->withErrors($message);
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
        if ($this->user->can('update', $task_to_update)) {
            return view('teacher.tasks.edit', [
                'title' => 'ЭДЗ. Редактирование задачи',
                'task_to_update' => $task_to_update
            ]);
        }
        $message = 'ОШИБКА. Нет права редактирования';
        return redirect('/teacher/tasks/' . $id)->withErrors($message);
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
        $task_to_update = $task->getOne($id);

        if ($this->user->can('update', $task_to_update)) {

            $response = $task->edit($id, $this->user->teacher->id, $data);

            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }
            $message = 'Задача под номером ' . $id . ' обновлена';
            return redirect('/teacher/tasks/' . $id)->with('status', $message);
        }
        $message = 'ОШИБКА. На автор. Нет прав редактирования !!!';
        return redirect('/teacher/tasks/' . $id)->withErrors($message);
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
        $task_to_delete = $task->getOne($id);
        if ($this->user->can('update', $task_to_delete)) {
            $task->kill($id);
            $message = 'Задача ' . $id . ' удалена!';
            return redirect('/teacher/tasks')->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права удаления !!!';
        return redirect('/teacher/tasks/' . $id)->withErrors($message);
    }
}
