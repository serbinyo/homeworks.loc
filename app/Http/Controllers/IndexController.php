<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index()
    {
        return view('index', ['title' => 'ЭДЗ. Главная', 'user' => Auth::user()]);
    }
}
