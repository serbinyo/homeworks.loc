<?php

namespace App\Http\Controllers\Teacher\Set;

use App\Http\Controllers\TeacherController;
use App\Material;
use App\Work;
use Illuminate\Http\Request;

class UnsetMaterialController extends TeacherController
{
    public function __invoke(Request $request, Material $material, Work $work)
    {
        $data = $request->except('_token');
        $material = $material->getOne($data['material_id']);
        $work = $work->getOne($data['work_id']);
        $work->materials()->detach($material);
        $message = 'Материал откреплен от работы';
        return back()->with('status', $message);
    }
}
