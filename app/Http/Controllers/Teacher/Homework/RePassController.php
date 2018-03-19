<?php

namespace App\Http\Controllers\Teacher\Homework;

use App\Http\Controllers\TeacherController;
use App\Homework;
use Illuminate\Http\Request;

class RePassController extends TeacherController
{
    public function rePass(Request $request)
    {
        $data = $request->except('_token');
        $homework = new Homework();
        $homework_to_update = $homework->getOne($data['homework_id']);

        if ($this->user->can('edit_mark', $homework_to_update)
            && ($data['grade_id'] == $homework_to_update->schoolkid->grade_id)
            && ($data['date'] == $homework_to_update->date_to_completion)
        ) {
            $homework->clear_marks($data['homework_id']);
            $message = 'Оценка сброшена';
            return back()->with('status', $message);
        }
    }
}
