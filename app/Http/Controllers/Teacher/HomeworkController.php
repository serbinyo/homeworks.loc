<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Homework;

class HomeworkController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('\teacher');
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
    public function show($grade_id, $date, $id)
    {
        $homework = new Homework();
        $homework_to_show = $homework->getOne($id);

        if ($this->user->can('view', $homework_to_show)) {


            $homework_content = [
                'given_tasks' => $homework_to_show->given_tasks->all(),
                'given_tests' => $homework_to_show->given_tests->all(),
                'materials' => $homework_to_show->work->materials->all()
            ];

            return view('teacher.homework.show', [
                'title' => 'ЭДЗ. Просмотр домашнего задания',
                'grade_id' => $grade_id,
                'date' => $date,
                'homework' => $homework_to_show,
                'homework_content' => $homework_content
            ]);

        }
        $message = 'ОШИБКА. Нет права просмотра !!!';
        return redirect('/teacher')->withErrors($message);
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
