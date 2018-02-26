<?php

namespace App\Http\Controllers\Teacher\Lists;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Grade;

class GradeListController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Grade $grade)
    {
        $grades = $grade->orderBy('name')->get();
        return view('teacher.lists.grades', [
            'title' => 'ЭДЗ. Классы',
            'grades' => $grades
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
        $grade = new Grade();
        $grade_to_show = $grade->getOne($id);
        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();

        return view('teacher.lists.grades.show', [
            'grade' => $grade_to_show,
            'schoolkids' => $schoolkids
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
        $grade = new Grade();
        $grade_to_show = $grade->getOne($data['grade_id']);
        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();

        return view('teacher.lists.grades.show', [
            'grade' => $grade_to_show,
            'schoolkids' => $schoolkids
        ]);
    }
}
