<?php

namespace App\Http\Controllers\Admin;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo __METHOD__;
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
