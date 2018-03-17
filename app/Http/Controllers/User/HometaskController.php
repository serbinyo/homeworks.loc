<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Homework;

class HometaskController extends UserController
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
    public function show($discipline_id, $date, $id)
    {
        $homework = new Homework();
        $homework_to_show = $homework->getOne($id);


        if ($this->user->can('view', $homework_to_show)
            && ($discipline_id == $homework_to_show->work->teacher->discipline_id)
            && ($date == $homework_to_show->date_to_completion)
        ) {

            if (isset($homework_to_show->computer_mark)) {
                $mark_to_show = $homework->percent_per_character($homework_to_show->computer_mark);
                $homework_to_show->computer_mark = $mark_to_show;
            }
            if (isset($homework_to_show->teacher_mark)) {
                $mark_to_show = $homework->percent_per_character($homework_to_show->teacher_mark);
                $homework_to_show->teacher_mark = $mark_to_show;
            }

            $homework_content = [
                'given_tasks' => $homework_to_show->given_tasks->all(),
                'given_tests' => $homework_to_show->given_tests->all(),
                'materials' => $homework_to_show->work->materials->all()
            ];

            return view('user.homework.show', [
                'title' => 'ЭДЗ. Просмотр домашнего задания',
                'discipline_id' => $discipline_id,
                'date' => $date,
                'homework' => $homework_to_show,
                'homework_content' => $homework_content,
            ]);

        }
        $message = 'ОШИБКА. Нет прав!!!';
        return redirect('/desktop')->withErrors($message);
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
    public function destroy($discipline_id, $date, $id)
    {
        echo __METHOD__;
        dump($id);
    }
}
