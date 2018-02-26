<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Discipline;

class DisciplineController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Discipline $discipline)
    {
        $disciplines = $discipline->orderBy('name')->get();
        return view('teacher.lists.disciplines', [
            'title' => 'ЭДЗ. Предметы',
            'disciplines' => $disciplines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $discipline = new Discipline();
        $discipline_to_show = $discipline->getOne($id);
        $teachers = $discipline_to_show->teachers()->orderBy('lastname')->get();

        return view('teacher.lists.disciplines.show', [
            'discipline' => $discipline_to_show,
            'teachers' => $teachers
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
        echo __METHOD__;
        dump($id);
    }

    /**
     * Display the specified resource.
     * Используется для открытия ресурса вызванного формой методом GET
     *
     * @return \Illuminate\Http\Response
     */
    public function view_by_get(Request $request)
    {
        $data = $request->except('_token');
        $discipline = new Discipline();
        $discipline_to_show = $discipline->getOne($data['discipline_id']);
        $teachers = $discipline_to_show->teachers()->orderBy('lastname')->get();

        return view('teacher.lists.disciplines.show', [
            'discipline' => $discipline_to_show,
            'teachers' => $teachers
        ]);
    }
}
