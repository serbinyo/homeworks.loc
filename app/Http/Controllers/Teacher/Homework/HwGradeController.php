<?php

namespace App\Http\Controllers\Teacher\Homework;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grade;

class HwGradeController extends Controller
{
    public function index(Grade $grade)
    {
        $grades = $grade->getAll();
        return view('teacher.homework.grade', [
            'title' => 'ЭДЗ. Выбор класса',
            'grades' => $grades
        ]);
    }

    public function view(Request $request, Grade $grade)
    {
        $grade_to_show = $grade->getOne($request->grade_id);

        $allKids = $grade_to_show->schoolkids->count();

        if ($allKids === 0) {
            $message = 'В классе нет учеников';
            return back()->withErrors($message);
        }

        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();

        return back()->with(['schoolkids' => $schoolkids]);
    }
}
