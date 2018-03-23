<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Schoolkid;

class SchoolkidController extends AdminController
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
     * @param \App\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function create(Grade $grade)
    {
        $grades = $grade->getAll();
        return view('admin.schoolkids.create', ['title' => 'ЭДЗ. Регистация ученика',
            'grades' => $grades]);
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
        $schoolkid = new Schoolkid();
        $schoolkid_to_show = $schoolkid->getOne($id);

        return view('admin.schoolkids.show', [
            'title' => 'Профиль учащигося',
            'schoolkid' => $schoolkid_to_show
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
        $schoolkid = new Schoolkid();
        $schoolkid_to_edit = $schoolkid->getOne($id);
        $grade = new Grade();
        $grades = $grade->getAll();
        return view('admin.schoolkids.edit', [
            'title' => 'Редактирование учетной записи',
            'schoolkid' => $schoolkid_to_edit,
            'grades' => $grades,
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
        $schoolkid = new Schoolkid();

        $response = $schoolkid->edit($id, $data);
        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }
        $message = 'Учетная запись обновлена';
        return redirect('/admin/kid/' . $id)->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolkid = new Schoolkid();
        $schoolkid_to_delete = $schoolkid->getOne($id);

        $homeworks = $schoolkid_to_delete->homeworks->count();

        if ($homeworks === 0) {
            $schoolkid->kill($id);
            $message = 'Профиль ученика ' . $id . ' удален';
            return redirect('/admin/lists/schoolkids/')->withErrors($message);
        }
        $message = 'Вы не можете удалить из системы ученика, к которому привязанны домашние задания. 
        Обратитесь к системному администратору';
        return back()->withErrors($message);
    }
}
