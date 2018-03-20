<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Discipline;

class AdminDisciplineController extends AdminController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new_discipline', ['title' => 'ЭДЗ. Новый предмет']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Discipline $discipline
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Discipline $discipline)
    {
        $data = $request->except('_token');
        $response = $discipline->store($data);

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $name = $response->name;
        $message = 'Предмет ' . $name . ' добавлен';
        return back()->with('status', $message);
    }
}
