<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Schoolkid;
use App\Work;
use App\Grade;
use Illuminate\Http\Request;

class SetIndividuallyController extends TeacherController
{
    public function index($id, Request $request, Work $work, Grade $grade)
    {
        $data = $request->except('_token');

        if (array_key_exists('grade', $data)) {
            $grades = null;
            $grade_to_show = $grade->getOne($data['grade']);
            $schoolkids = $grade_to_show->schoolkids;
        } else {
            $grade_to_show = null;
            $schoolkids = null;
            $grades = $grade->getAll();
        }

        $work_to_set = $work->getOne($id);

        if ($this->user->can('view', $work_to_set)) {
            return view('teacher.works.set_individually', [
                'title' => 'ЭДЗ. TeacherSetIndividually',
                'work_id' => $id,
                'grades' => $grades,
                'grade' => $grade_to_show,
                'schoolkids' => $schoolkids
            ]);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/teacher/works/')->withErrors($message);
    }

    public function set(Request $request, Work $work, Schoolkid $schoolkid)
    {
        $data = $request->except('_token');

        $kid = $schoolkid->getOne($data['schoolkid_id']);
        $work_to_set = $work->getOne($data['work_id']);

        $hasHomework = $schoolkid->hasHomework($kid, $work_to_set);
        if ($hasHomework) {
            $message = 'Работа '
                . $data['work_id']
                . ' уже добавлена ученику: '
                . $schoolkid->firstname . ' '
                . $schoolkid->lastname;
            return back()->withErrors($message);
        } else {
            $schoolkid->setHomework($kid, $work_to_set, $data['date']);
            $message = 'Работа '
                . $data['work_id']
                . ' добавлена ученику: '
                . $schoolkid->firstname . ' '
                . $schoolkid->lastname;
            return back()->with('status', $message);
        }
    }
}
