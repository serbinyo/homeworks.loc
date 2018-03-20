<?php

namespace App\Http\Controllers\Teacher;

use App\Discipline;
use App\Http\Controllers\TeacherController;
use App\Schoolkid;
use App\Teacher;
use Illuminate\Http\Request;
use App\Grade;

class ListsController extends TeacherController
{
    public function index()
    {
        return view('teacher.lists', [
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
        $grades = $grade->getAll();
        return view('teacher.lists.grades', [
            'title' => 'Классы',
            'grades' => $grades
        ]);
    }

    /**
     * Display the specified resource.
     * Используется для открытия ресурса вызванного формой методом GET
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function grade_show_by_get(Request $request)
    {
        $data = $request->except('_token');
        if (!array_key_exists('grade_id', $data)) {
            return redirect('/teacher/lists/grades');
        }
        $grade = new Grade();
        $grade_to_show = $grade->getOne($data['grade_id']);
        $allKids = $grade_to_show->schoolkids->count();
        if ($allKids === 0) {
            $message = 'В классе нет учеников';
            return back()->withErrors($message);
        }
        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();
        return view('teacher.lists.grades.show', [
            'title' => 'Класс',
            'grade' => $grade_to_show,
            'schoolkids' => $schoolkids
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
        return view('teacher.lists.grades.show', [
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
        $disciplines = $discipline->orderBy('name')->get();
        return view('teacher.lists.disciplines', [
            'title' => 'ЭДЗ. Предметы',
            'disciplines' => $disciplines
        ]);
    }

    /**
     * Display the specified resource.
     * Используется для открытия ресурса вызванного формой методом GET
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function discipline_show_by_get(Request $request)
    {
        $data = $request->except('_token');
        $discipline = new Discipline();
        $discipline_to_show = $discipline->getOne($data['discipline_id']);
        $teachers = $discipline_to_show->teachers()->orderBy('lastname')->get();

        return view('teacher.lists.disciplines.show', [
            'title' => $discipline_to_show->name,
            'discipline' => $discipline_to_show,
            'teachers' => $teachers
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

        return view('teacher.lists.disciplines.show', [
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
        return view('teacher.lists.schoolkids', [
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
        return view('teacher.lists.teachers', [
            'title' => 'Учителя',
            'teachers' => $teachers
        ]);
    }
}
