<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Grade;

class GradeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Grade $grade)
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
        return view('admin.new_grade', ['title' => 'ЭДЗ. Новый класс']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Grade $grade
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Grade $grade)
    {
        $data = $request->except('_token');
        $response = $grade->store($data);

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $num = $response->num;
        $char = $response->char;
        $message = $num . ' - ' . $char . ' класс - добавлен';
        return back()->with('status', $message);
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
