<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


class DesktopController extends UserController
{
    public function index()
    {
        return view('user.desktop', ['title' => 'ЭДЗ. Desktop']);
    }
}
