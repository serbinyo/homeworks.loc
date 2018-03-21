<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function grade_show($id)
    {
        $grade = new Grade();
        $grade_to_show = $grade->getOne($id);
        $allKids = $grade_to_show->schoolkids->count();
        if ($allKids === 0) {
            $message = 'В классе нет учеников';
            return back()->withErrors($message);
        }
        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();
        return view('admin.lists.grades.show', [
            'title' => 'ЭДЗ. Класс',
            'grade' => $grade_to_show,
            'schoolkids' => $schoolkids
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function discipline_show($id)
    {
        $discipline = new Discipline();
        $discipline_to_show = $discipline->getOne($id);
        $teachers = $discipline_to_show->teachers()->orderBy('lastname')->get();

        return view('admin.lists.disciplines.show', [
            'title' => $discipline_to_show->name,
            'discipline' => $discipline_to_show,
            'teachers' => $teachers
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
        $schoolkids = $schoolkid->orderBy('lastname')->paginate(5);
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
        $teachers = $teacher->orderBy('lastname')->paginate(5);
        return view('admin.lists.teachers', [
            'title' => 'Учителя',
            'teachers' => $teachers
        ]);
    }
}
