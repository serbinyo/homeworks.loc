<?php

/*
 * Испльзуется имя класса AccountController для модели Teacher,
 * а не более подходящее TeacherController потому что класс TeacherController
 * уже есть и используется для проверки роли учителя
 */

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Teacher;

class AccountController extends TeacherController
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

        if ($this->user->can('view', $teacher_to_show)) {
            return view('teacher.account', [
                'title' => 'ЭДЗ. Просмотр профиля',
                'teacher' => $teacher_to_show,
            ]);
        }
        $message = 'ОШИБКА. Нет прав';
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
        $teacher = new Teacher();
        $teacher_to_update = $teacher->getOne($id);
        if ($this->user->can('update', $teacher_to_update)) {

            return view('teacher.account.edit', [
                'title' => 'ЭДЗ. Редактирование профиля',
                'teacher' => $teacher_to_update,
            ]);
        }

        $message = 'ОШИБКА. Нет прав';
        return redirect('/teacher')->withErrors($message);

        //todo сделать возможность менять пароль
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
        $teacher = new Teacher();
        $teacher_to_update = $teacher->getOne($id);
        if ($this->user->can('update', $teacher_to_update)) {

            $response = $teacher->edit($id, $data);
            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }
            $message = 'Учетная запись обновлена';
            return redirect('/teacher/account/' . $id)->with('status', $message);

        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/teacher')->withErrors($message);
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
        if ($this->user->can('update', $teacher_to_delete)) {
            $teacher->kill($id);
            $message = 'Учетная запись учителя ' . $id . ' удалена!';
            return redirect('/')->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права удаления !!!';
        return redirect('/teacher')->withErrors($message);
    }
}
