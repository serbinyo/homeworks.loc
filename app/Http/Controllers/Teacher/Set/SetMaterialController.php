<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Material;
use App\Work;

class SetMaterialController extends TeacherController
{
    public function set(Request $request, Material $material, Work $work)
    {
        $data = $request->except('_token');
        $material = $material->getOne($data['material_id']);
        $work = $work->getOne($data['work_id']);

        $hasTask = $work->materials()->where('id', $data['material_id'])->exists();
        if ($hasTask) {
            $message = 'Материал уже добавлен в задание №: ' . $data['work_id'];
            return redirect('/teacher/materials')->withErrors($message);
        } else {
            $work->materials()->attach($material);
            $message = 'Учебный материал добавлен к заданию №: ' . $data['work_id'];
            return redirect('/teacher/materials')->with('status', $message);
        }
    }
}
