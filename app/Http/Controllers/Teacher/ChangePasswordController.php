<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use App\Teacher;
use Illuminate\Http\Request;

class ChangePasswordController extends TeacherController
{
    public function index()
    {
        return view('teacher.account.change_password', ['title' => 'ЭДЗ. Смена пароля',
        'teacher' => $this->user->teacher
        ]);
    }

    public function change(Request $request, Teacher $teacher)
    {
        $data = $request->except('_token');

        $response = $teacher->change_password($this->user->teacher->id, $data);
        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $message = 'Пароль успешно изменен';
        return redirect('/teacher/account/' . $this->user->teacher->id)->with('status', $message);
    }
}
