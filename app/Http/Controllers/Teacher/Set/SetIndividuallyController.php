<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Schoolkid;
use App\Work;
use Illuminate\Http\Request;

class SetIndividuallyController extends TeacherController
{
    public function index($id, Work $work)
    {
        $work_to_set = $work->getOne($id);

        if ($this->user->can('view', $work_to_set)) {
            return view('teacher.works.set_individually', [
                'title' => 'ЭДЗ. TeacherSetIndividually',
                'work_id' => $id
            ]);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/teacher/works/')->withErrors($message);
    }

    public function set(Request $request, Work $work, Schoolkid $schoolkid)
    {
        $data = $request->except('_token');

        $schoolkid = $schoolkid->getOne($data['schoolkid_id']);
        $work = $work->getOne($data['work_id']);

        $hasHomework = $work->schoolkids()->where('schoolkid_id', $data['schoolkid_id'])->exists();
        if ($hasHomework) {
            $message = 'Работа '
                . $data['work_id']
                . ' уже добавлена ученику: '
                . $schoolkid->firstname . ' '
                . $schoolkid->lastname;
            return back()->withErrors($message);
        } else {
            $work->schoolkids()->attach($schoolkid, ['date_to_completion' => '2018-09-13']);
            $message = 'Работа '
                . $data['work_id']
                . ' добавлена ученику: '
                . $schoolkid->firstname . ' '
                . $schoolkid->lastname;
            return back()->with('status', $message);
        }
    }
}
