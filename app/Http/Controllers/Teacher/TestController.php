<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Test;
use App\Teacher;

class TestController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Test $test, Teacher $author)
    {
        $discipline_id = $this->user->teacher->discipline_id;
        $all_tests = $test->testsToShow($discipline_id);
        return view('teacher.tests', [
            'title' => 'ЭДЗ. Тесты',
            'tests' => $all_tests,
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
        return view('teacher.tests.create', ['title' => 'ЭДЗ. Новый тест']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test)
    {
        $data = $request->except('_token');
        $response = $test->store($data, $this->user->teacher->id);
        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }
        $new_test_id = $response->id;
        $message = 'Тест добавлен под номером ' . $new_test_id;
        return redirect('/teacher/tests')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = new Test();
        $test_to_show = $test->getOne($id);

        $author = new Teacher();
        $author_fio = $author->getFIO($test_to_show->teacher_id);

        return view('teacher.tests.show', [
            'title' => 'ЭДЗ. Просмотр теста',
            'test' => $test_to_show,
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
        $test = new Test();
        $test_to_update = $test->getOne($id);
        $this->authorize('update', $test_to_update);

        return view('teacher.tests.edit', [
            'title' => 'ЭДЗ. Новый тест',
            'test_to_update' => $test_to_update
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
        $test = new Test();
        $test_for_update = $test->getOne($id);

        if ($this->user->can('update', $test_for_update)) {

            $response = $test->edit($id, $this->user->teacher->getAuthIdentifier(), $data);

            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }
            $message = 'Тест под номером ' . $id . ' обновлен';
            return redirect('/teacher/tests/' . $id)->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права редактирования !!!';
        return redirect('/teacher/tests/' . $id)->withErrors($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = new Test();
        $test_for_delete = $test->getOne($id);
        if ($this->user->can('update', $test_for_delete)) {
            $test->kill($id);
            $message = 'Тест ' . $id . ' удален!';
            return redirect('/teacher/tests')->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права удаления !!!';
        return redirect('/teacher/tests/' . $id)->withErrors($message);
    }
}
