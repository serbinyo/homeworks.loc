<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;


class DesktopController extends UserController
{
    public function index()
    {
        $grade = $this->user->schoolkid->grade->num . ' - ' . $this->user->schoolkid->grade->char;
        return view('user.desktop', [
            'title' => 'ЭДЗ. Desktop',
            'schoolkid' => $this->user->schoolkid,
            'grade' => $grade,
        ]);
    }
}
