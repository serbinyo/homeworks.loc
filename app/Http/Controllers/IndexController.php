<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrator;

class IndexController extends Controller
{
    function index()
    {
        return view('index', ['title' => 'ЭДЗ. Главная', 'user' => '']);
    }
}
