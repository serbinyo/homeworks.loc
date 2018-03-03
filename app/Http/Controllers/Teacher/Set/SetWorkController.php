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
        $grades = $grade->orderBy('name')->get();
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

    public function set(Request $request, Work $work, Grade $grade)
    {
        $data = $request->except('_token');
        $work_to_set = $work->getOne($data['work_id']);

        if ($this->user->can('view', $work_to_set)) {

            $grade_id = $data['grade'];
            $grade = $grade->getOne($grade_id);
            $allKids = $grade->schoolkids->count();
            $hasHomeworkKids = 0;

            if ($allKids !== 0) {
                foreach ($grade->schoolkids as $kid) {

                    $hasHomework = $kid->hasHomework($work_to_set);

                    if (!$hasHomework) {
                        $homework_id = $kid->setHomework($work_to_set, $data['date']);
                    } else {
                        $hasHomeworkKids = $hasHomeworkKids + 1;
                    }
                }

                if ($allKids === $hasHomeworkKids) {
                    $message = 'Работа '
                        . $data['work_id']
                        . ' уже была заданна '
                        . $grade->name
                        . ' классу';
                    return back()->withErrors($message);
                } else {
                    $message = 'Работа '
                        . $data['work_id']
                        . ' заданна '
                        . $grade->name
                        . ' классу';
                    return back()->with('status', $message);
                }
            }
            $message = 'В классе нет учеников';
            return back()->withErrors($message);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/teacher/works/')->withErrors($message);
    }
}
