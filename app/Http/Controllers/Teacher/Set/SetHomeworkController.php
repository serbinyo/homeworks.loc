<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Schoolkid;
use App\Work;
use Illuminate\Http\Request;

class SetHomeworkController extends TeacherController
{
    public function __invoke(Request $request, Work $work, Schoolkid $schoolkid)
    {
        $data = $request->except('_token');

        $schoolkid = $schoolkid->getOne($data['schoolkid_id']);
        $work = $work->getOne($data['work_id']);

        //todo запретить повторно назначать одну и туже работу одному и тому же ученику

        $work->schoolkids()->attach($schoolkid, ['date_to_completion'=>'2018-09-13']);
        //return view('teacher.sethomework', ['title' => 'ЭДЗ. Создать ДЗ', 'id' => $data['id']]);
    }
}
