<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Test;
use Response;

class TestController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Test $test)
    {
        $all_tests = $test->showAll();
        return view('teacher.tests', ['title' => 'ЭДЗ. Тесты', 'tests' => $all_tests]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Test $test)
    {
        $data = $request->except('_token');
        $response = $test->store($data, $this->teacher->getAuthIdentifier());
        if (is_array($response) && array_key_exists('errors', $response))
        {
            return back()->withInput()->withErrors($response['errors']);
        }
        $new_test_id = $response->id;
        $message = 'Тест добавлен c номером ' . $new_test_id;
        return redirect('/teacher/tests/create')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = new Test;
        $test_to_show = $test->show($id);
        return view('teacher.tests.show', [
            'title' => 'ЭДЗ. Просмотр теста',
            'test' => $test_to_show,
            'teacher' => $this->teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo __METHOD__;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo __METHOD__;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo __METHOD__;
        dump($id);
    }
}
