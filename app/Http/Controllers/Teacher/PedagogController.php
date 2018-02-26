<?php

/*
 * Испльзуется имя класса PedagogController для модели Teacher,
 * а не более подходящее TeacherController потому что класс TeacherController
 * уже есть, используется для проверки роли учителя
 */

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Teacher;

class PedagogController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Teacher $teacher)
    {
        $teachers = $teacher->orderBy('lastname')->paginate(5);
        return view('teacher.lists.teachers', [
            'title' => 'ЭДЗ. Классы',
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

        if ($this->user->can('view', $teacher_to_show)) {
            return view('teacher.account.show', [
                'title' => 'ЭДЗ. Просмотр профиля',
                'teacher' => $teacher_to_show,
            ]);
        }
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
        echo __METHOD__;
        dump($id);
    }
}
