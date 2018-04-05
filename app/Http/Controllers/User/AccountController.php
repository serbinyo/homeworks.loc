<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Schoolkid;

class AccountController extends UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo __METHOD__;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo __METHOD__;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo __METHOD__;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schoolkid = new Schoolkid();
        $schoolkid_to_show = $schoolkid->getOne($id);

        if ($this->user->can('view', $schoolkid_to_show)) {
            return view('user.account', [
                'title' => 'ЭДЗ. Просмотр профиля',
                'schoolkid' => $schoolkid_to_show,
            ]);
        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/desktop')->withErrors($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolkid = new Schoolkid();
        $schoolkid_to_update = $schoolkid->getOne($id);
        if ($this->user->can('update', $schoolkid_to_update)) {

            return view('user.account.edit', [
                'title' => 'ЭДЗ. Редактирование профиля',
                'schoolkid' => $schoolkid_to_update,
            ]);
        }

        $message = 'ОШИБКА. Нет прав';
        return redirect('/desktop')->withErrors($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $schoolkid = new Schoolkid();
        $schoolkid_to_update = $schoolkid->getOne($id);
        if ($this->user->can('update', $schoolkid_to_update)) {

            $response = $schoolkid->edit($id, $data);
            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }
            $message = 'Учетная запись обновлена';
            return redirect('/kid-account/' . $id)->with('status', $message);

        }
        $message = 'ОШИБКА. Нет прав';
        return redirect('/desktop')->withErrors($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolkid = new Schoolkid();
        $schoolkid_to_delete = $schoolkid->getOne($id);
        if ($this->user->can('delete', $schoolkid_to_delete)) {
            $schoolkid->kill($id);
            $message = 'Учетная запись учащегося ' . $id . ' удалена!';
            return redirect('/')->with('status', $message);
        }
        $message = 'ОШИБКА. Нет права удаления !!!';
        return redirect('/desktop')->withErrors($message);
    }
}
