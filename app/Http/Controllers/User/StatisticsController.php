<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class StatisticsController extends UserController
{
    public function index()
    {
        return view('user.statistics', ['title' => 'ЭДЗ. Stat']);
    }
}
