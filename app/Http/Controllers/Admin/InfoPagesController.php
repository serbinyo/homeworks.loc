<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;

class InfoPagesController extends AdminController
{
    public function afterReg()
    {
        $message = 'Запись добавленна';
        return redirect('/admin')->with('status', $message);
    }
}
