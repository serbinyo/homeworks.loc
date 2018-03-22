<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Discipline;
use App\Schoolkid;
use App\Teacher;
use App\Grade;

class ListsController extends AdminController
{
    public function index()
    {
        return view('admin.lists', [
            'title' => 'ЭДЗ. Списки'
        ]);
    }

    //GRADE

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Grade $grade
     * @return \Illuminate\Http\Response
     */
    public function grade_list(Grade $grade)
    {
        $grades = $grade->getAllPaginated(8);
        return view('admin.lists.grades', [
            'title' => 'Классы',
            'grades' => $grades
        ]);
    }

    //Discipline

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Discipline $discipline
     * @return \Illuminate\Http\Response
     */
    public function discipline_list(Discipline $discipline)
    {
        $disciplines = $discipline->getAllPaginated(5);
        return view('admin.lists.disciplines', [
            'title' => 'ЭДЗ. Предметы',
            'disciplines' => $disciplines
        ]);
    }

    //Schoolkid

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Schoolkid $schoolkid
     * @return \Illuminate\Http\Response
     */
    public function schoolkid_list(Schoolkid $schoolkid)
    {
        $schoolkids = $schoolkid->getAllPaginated(25);
        return view('admin.lists.schoolkids', [
            'title' => 'ЭДЗ. Классы',
            'schoolkids' => $schoolkids
        ]);
    }

    //Teacher

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function teacher_list(Teacher $teacher)
    {
        $teachers = $teacher->getAllPaginated(10);
        return view('admin.lists.teachers', [
            'title' => 'Учителя',
            'teachers' => $teachers
        ]);
    }
}
