<?php

namespace App\Http\Controllers\Admin;

use App\Discipline;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Teacher;

class PedagogueController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo __METHOD__;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Discipline $discipline
     * @return \Illuminate\Http\Response
     */
    public function create(Discipline $discipline)
    {
        $disciplines = $discipline->getAll();
        return view('admin.teachers.create', [
            'title' => 'ЭДЗ. Регистрация учителя',
            'disciplines' => $disciplines
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo __METHOD__;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = new Teacher();
        $teacher_to_show = $teacher->getOne($id);

        return view('admin.teachers.show', [
            'title' => 'Профиль преподавателя',
            'teacher' => $teacher_to_show
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
        $teacher = new Teacher();
        $teacher_to_update = $teacher->getOne($id);
        $discipline = new Discipline();
        $disciplines = $discipline->getAll();
        return view('admin.teachers.edit', [
            'title' => 'Редактирование учетной записи',
            'teacher' => $teacher_to_update,
            'disciplines' => $disciplines,
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
        $data = $request->except('_token', '_method');
        $teacher = new Teacher();

        $response = $teacher->edit($id, $data);
        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }
        $message = 'Учетная запись обновлена';
        return redirect('/admin/teach/' . $id)->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = new Teacher();
        $teacher_to_delete = $teacher->getOne($id);
        $works = $teacher_to_delete->works->count();
        $tasks = $teacher_to_delete->tasks->count();
        $tests = $teacher_to_delete->tests->count();
        $materials = $teacher_to_delete->materials->count();
        $allWorks = ($works + $tasks + $tests + $materials);

        if ($allWorks === 0) {
            $teacher->kill($id);
            $message = 'Профиль учителя ' . $id . ' удален';
            return redirect('/admin/lists/teachers/')->withErrors($message);
        }
        $message = 'Вы не можете удалить из системы учителя, к которому привязанны работы,
        тесты, задачи или учебные материалы. Обратитесь к системному администратору';
        return back()->withErrors($message);
    }
}
