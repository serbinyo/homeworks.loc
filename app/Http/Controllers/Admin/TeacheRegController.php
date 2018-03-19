<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Discipline;

class TeacheRegController extends AdminController
{
    public function index(Discipline $disciplineModel)
    {
        $disciplines = $disciplineModel->getAll();
        return view('admin.teacherreg', ['title' => 'ЭДЗ. Регистрация учителя',
            'disciplines' => $disciplines]);
    }
}
