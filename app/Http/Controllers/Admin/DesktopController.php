<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

class DesktopController extends AdminController
{
    public function index()
    {
        return view('admin.desktop', [
            'title' => 'ЭДЗ. Администратор',
        ]);
    }
}
