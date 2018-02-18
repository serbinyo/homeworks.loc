<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Material;
use App\Teacher;

class MaterialController extends TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Material $material, Teacher $author)
    {
        $all_materials = $material->getAllPaginated();
        return view('teacher.materials', [
            'title' => 'ЭДЗ. Материалы',
            'materials' => $all_materials,
            'author' => $author
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.materials.create', ['title' => 'ЭДЗ. Новый учебыный материал']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Material $material)
    {
        $data = $request->except('_token');
        $response = $material->store($data, $this->user->teacher->id);
        if (is_array($response) && array_key_exists('errors', $response)) {
            return back()->withInput()->withErrors($response['errors']);
        }
        $new_material_id = $response->id;
        $message = 'Учебный материал добавлен под номером ' . $new_material_id;
        return redirect('/teacher/materials')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = new Material();
        $material_to_show = $material->getOne($id);

        $author = new Teacher();
        $author_fio = $author->getFIO($material_to_show->teachers_id);

        return view('teacher.materials.show', [
            'title' => 'ЭДЗ. Просмотр учебного материала',
            'material' => $material_to_show,
            'teacher' => $this->user->teacher,
            'author_fio' => $author_fio
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
        $material = new Material();
        $material_to_update = $material->getOne($id);
        $this->authorize('update', $material_to_update);

        return view('teacher.materials.edit', [
                'title' => 'ЭДЗ. Редактирование материала',
                'material_to_update' => $material_to_update]
        );
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
        $material = new Material();

        $material_for_update = $material->getOne($id);

        if ($this->user->can('update', $material_for_update)) {

            $response = $material->edit($id, $this->user->teacher->getAuthIdentifier(), $data);

            if (is_array($response) && array_key_exists('errors', $response)) {
                return back()->withInput()->withErrors($response['errors']);
            }

            $message = 'Материал под номером ' . $id . ' обновлен';
            return redirect('/teacher/materials/' . $id)->with('status', $message);
        }
        $message = 'ОШИБКА. На автор. Нет прав редактирования !!!';
        return redirect('/teacher/tests/' . $id)->withErrors($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = new Material();
        $material->kill($id);
        $message = 'Учебный материал ' . $id . ' удален!';
        return redirect('/teacher/materials')->with('status', $message);
    }
}
