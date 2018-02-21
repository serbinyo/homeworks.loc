<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Teacher;
use App\Work;
use Illuminate\Http\Request;


class WorksController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Work $work, Teacher $author)
    {
        $all_works = $work->getAllPaginated();
        return view('teacher.works', [
            'title' => 'ЭДЗ. Задания',
            'works' => $all_works,
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
        return view('teacher.works.create', ['title' => 'ЭДЗ. Создать задание']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Work $work)
    {
        $data = $request->except('_token');
        $response = $work->store($data, $this->user->teacher->id);
        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }
        $new_work_id = $response->id;
        $message = 'Работа добавлена под номером ' . $new_work_id;
        return redirect('/teacher/works')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = new Work();
        $work_to_show = $work->getOne($id);

        $author = new Teacher();
        $author_fio = $author->getFIO($work_to_show->teacher_id);

        return view('teacher.works.show', [
            'title' => 'ЭДЗ. Просмотр работы',
            'work' => $work_to_show,
            'teacher' => $this->user->teacher,
            'author_fio' => $author_fio
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
        $work = new Work();
        $work_to_update = $work->getOne($id);
        $this->authorize('update', $work_to_update);

        return view('teacher.works.edit', [
            'title' => 'ЭДЗ. Новый тест',
            'work_to_update' => $work_to_update
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
        $work = new Work();
        $work_for_update = $work->getOne($id);

        if ($this->user->can('update', $work_for_update)) {

            $response = $work->edit($id, $this->user->teacher->getAuthIdentifier(), $data);

            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }
            $message = 'Работа под номером ' . $id . ' обновлена';
            return redirect('/teacher/works/' . $id)->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права редактирования !!!';
        return redirect('/teacher/works/' . $id)->withErrors($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = new Work();
        $work_for_delete = $work->getOne($id);
        if ($this->user->can('update', $work_for_delete)) {
            $work->kill($id);
            $message = 'Работа ' . $id . ' удалена!';
            return redirect('/teacher/works')->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права удаления !!!';
        return redirect('/teacher/works/' . $id)->withErrors($message);
    }
}
