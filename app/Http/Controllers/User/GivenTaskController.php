<?php

namespace App\Http\Controllers\User;

use App\Given_task;
use App\Homework;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class GivenTaskController extends UserController
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
        echo __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($discipline_id, $date, $homework_id, $id)
    {
        //dump($discipline_id, $date, $homework_id, $id);
        $task = new Given_task();
        $task_to_update = $task->getOne($id);

        $homework = new Homework();
        $homework_to_solve = $homework->getOne($homework_id);

        if (empty($homework_to_solve)) {
            $message = 'ОШИБКА. Нет прав';
            return redirect('/desktop')->withErrors($message);
        }

        if ($this->user->can('update', $task_to_update)
            && ($discipline_id == $homework_to_solve->work->teacher->discipline_id)
            && ($date == $homework_to_solve->date_to_completion)
            && ($homework_id == $homework_to_solve->id)
        ) {

            return view('user.homework.solve.task', [
                'title' => 'ЭДЗ. Решать задачу',
                'discipline_id' => $discipline_id,
                'date' => $date,
                'homework_id' => $homework_id,
                'task' => $task_to_update
            ]);
        }

        $message = 'ОШИБКА. Нет прав';
        return redirect('/desktop')->withErrors($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $discipline_id, $date, $homework_id, $id)
    {

        $data = $request->except('_token', '_method');
        $task = new Given_task();
        $task_to_update = $task->getOne($id);

        $homework = new Homework();
        $homework_to_solve = $homework->getOne($homework_id);

        if ($this->user->can('update', $task_to_update)
            && ($discipline_id == $homework_to_solve->work->teacher->discipline_id)
            && ($date == $homework_to_solve->date_to_completion)
            && ($homework_id == $homework_to_solve->id)
        ) {
            $response = $task->edit($id, $data);

            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }

            $message = 'Ответ записан';
            return redirect( route('hometask.show',[
                $discipline_id, $date, $homework_id
            ]))->with('status', $message);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/desktop')->withErrors($message);
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
    }
}
