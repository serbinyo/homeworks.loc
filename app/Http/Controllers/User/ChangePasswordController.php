<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Schoolkid;

class ChangePasswordController extends UserController
{
    public function index()
    {
        return view('user.account.change_password', [
            'title' => 'ЭДЗ. Смена пароля',
            'schoolkid' => $this->user->schoolkid
        ]);
    }

    public function change(Request $request)
    {
        $data = $request->except('_token');
        $schoolkid = new Schoolkid();
        $schoolkid_to_update = $schoolkid->getOne($data['id']);

        if ($this->user->can('update', $schoolkid_to_update)) {
            $response = $schoolkid->change_password($this->user->schoolkid->id, $data);
            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }

            $message = 'Пароль успешно изменен';
            return redirect('/kid-account/' . $this->user->schoolkid->id)->with('status', $message);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/desktop')->withErrors($message);
    }
}
