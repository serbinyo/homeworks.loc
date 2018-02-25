<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Grade;
use App\Schoolkid;
use App\Work;
use Illuminate\Http\Request;

class SetWorkController extends TeacherController
{
    public function index($id, Work $work, Grade $grade)
    {
        $work_to_set = $work->getOne($id);
        $grades = $grade->getAll();

        if ($this->user->can('view', $work_to_set)) {
            return view('teacher.works.set', [
                'title' => 'ЭДЗ. TeacherSetWork',
                'work_id' => $id,
                'grades' => $grades
            ]);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/teacher/works/')->withErrors($message);
    }

    public function set(Request $request, Work $work, Schoolkid $schoolkid, Grade $grade)
    {
        $data = $request->except('_token');
        $grade_id = $data['grade'];
        $grade = $grade->getOne($grade_id);
        dd($grade->schoolkids);



        $schoolkid = $schoolkid->getOne($data['schoolkid_id']);
        $work = $work->getOne($data['work_id']);



        //todo запретить повторно назначать одну и туже работу одному и тому же ученику

        $work->schoolkids()->attach($schoolkid, ['date_to_completion' => '2018-09-13']);
        //return view('teacher.sethomework', ['title' => 'ЭДЗ. Создать ДЗ', 'id' => $data['id']]);
    }
}
