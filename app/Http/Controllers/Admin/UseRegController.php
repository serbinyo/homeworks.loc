<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Grade;

class UseRegController extends AdminController
{
    public function index(Grade $gradeModel)
    {
        $grades = $gradeModel->getAll();
        return view('admin.userreg', ['title' => 'ЭДЗ. Регистация ученика',
            'grades' => $grades]);
    }
}
