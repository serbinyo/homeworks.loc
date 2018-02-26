<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Grade;

class GradesController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Grade $grade)
    {
        $all_grades = $grade->getAll();
        return view('teacher.grades', [
            'title' => 'ЭДЗ. Классы',
            'grades' => $all_grades
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
    public function show(Request $request)
    {
        $data = $request->except('_token');
        $grade = new Grade();
        $grade_to_show = $grade->getOne($data['grade_id']);
        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();

        return view('teacher.grades.show', [
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
}
