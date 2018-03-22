<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Discipline;

class DisciplineController extends AdminController
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
        return view('admin.disciplines.create', ['title' => 'ЭДЗ. Новый предмет']);
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discipline = new Discipline();
        $discipline_to_show = $discipline->getOne($id);
        $teachers = $discipline_to_show->teachers()->orderBy('lastname')->get();

        return view('admin.disciplines.show', [
            'title' => $discipline_to_show->name,
            'discipline' => $discipline_to_show,
            'teachers' => $teachers
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
        $discipline = new Discipline();
        $discipline_to_update = $discipline->getOne($id);
        return view('admin.disciplines.edit', [
            'title' => 'Редактирование предмета',
            'discipline' => $discipline_to_update
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
        $discipline = new Discipline();

        $response = $discipline->edit($id, $data);

        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }

        $message = 'Предмет ' . $response->name . ' - данные обновлены';
        return redirect(route('discipline.show', $id))->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discipline = new Discipline();
        $discipline_to_delete = $discipline->getOne($id);
        $allTeachers = $discipline_to_delete->teachers->count();

        if ($allTeachers === 0) {
            $name = $discipline_to_delete->name;
            $discipline->kill($id);
            $message = 'Предмет ' . $name . ' удален';
            return redirect('/admin/lists/disciplines/')->withErrors($message);
        }
        $message = 'Вы не можете удалить из системы предмет, к которому преписаны учителя. 
        Обратитесь к системному администратору';
        return back()->withErrors($message);
    }
}
