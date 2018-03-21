<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Grade;

class GradeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Grade $grade)
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
        return view('admin.grades.create', ['title' => 'ЭДЗ. Новый класс']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Grade $grade
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Grade $grade)
    {
        $data = $request->except('_token');
        $response = $grade->store($data);

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $num = $response->num;
        $char = $response->char;
        $message = $num . ' - ' . $char . ' класс - добавлен';
        return back()->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = new Grade();
        $grade_to_show = $grade->getOne($id);
        $allKids = $grade_to_show->schoolkids->count();
        if ($allKids === 0) {
            $message = 'В классе нет учеников';
            return back()->withErrors($message);
        }
        $schoolkids = $grade_to_show->schoolkids()->orderBy('lastname')->get();
        return view('admin.grades.show', [
            'title' => 'Класс',
            'grade' => $grade_to_show,
            'schoolkids' => $schoolkids
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = new Grade();
        $grade_to_update = $grade->getOne($id);
        return view('admin.grades.edit', [
            'title' => 'Редактирование класса',
            'grade' => $grade_to_update
        ]);
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
        $data = $request->except('_token', '_method');
        $grade = new Grade();

        $response = $grade->edit($id, $data);

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $num = $response->num;
        $char = $response->char;
        $message = $num . ' - ' . $char . ' класс - данные обновлены';
        return back()->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = new Grade();
        $grade_to_delete = $grade->getOne($id);
        $allKids = $grade_to_delete->schoolkids->count();
        if ($allKids === 0) {
            $num = $grade_to_delete->num;
            $char = $grade_to_delete->char;
            $grade->kill($id);
            $message = 'Класс ' . $num . ' - ' . $char . ' удален';
            return redirect('/admin/lists/grades/')->withErrors($message);
        }
        $message = 'Вы не можете удалить из системы класс, в котором есть ученики. 
        Обратитесь к системному администратору';
        return back()->withErrors($message);


    }
}
