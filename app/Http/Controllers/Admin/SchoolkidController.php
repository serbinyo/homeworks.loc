<?php

namespace App\Http\Controllers\Admin;

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
