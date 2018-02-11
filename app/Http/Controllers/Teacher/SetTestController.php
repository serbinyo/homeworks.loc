<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetTestController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->except('_token');
        return view('teacher.settest', ['title' => 'ЭДЗ. Создать ДЗ', 'id' => $data['id']]);
    }
}
