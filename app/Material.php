<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Material extends Model
{
    protected $fillable = [
        'teacher_id', 'theme', 'image', 'title', 'body'
    ];

    public function getAllPaginated()
    {
        $entities = Material::orderBy('id', 'desc')->paginate(10);
        return $entities;
    }

    public function getDisciplineMaterialsPaginated($discipline_id)
    {
        $entities = DB::table('materials')
            ->join('teachers', 'materials.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('disciplines.id', $discipline_id)
            ->select('materials.*')
            ->orderBy('materials.id', 'desc')
            ->paginate(10);
        return $entities;
    }

    public function getOne($id)
    {
        $entity = Material::find($id);
        return $entity;
    }

    public function store($data, $teacher_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        if ($data['image'] == '') {
            $data['image'] = 'no image';
        }

        $newMaterial = [
            'teacher_id' => $teacher_id,
            'theme' => $data['theme'],
            'image' => $data['image'],
            'title' => $data['title'],
            'body' => $data['body']
        ];
        $this->fill($newMaterial);
        $this->save();
        return $this;
    }

    public function edit($id, $teacher_id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = Material::find($id);

        $entity->teacher_id = $teacher_id;
        $entity->theme = $data['theme'];
        $entity->image = $data['image'];
        $entity->title = $data['title'];
        $entity->body = $data['body'];

        if ($entity->image == ''){
            $entity->image = 'no image';
        }

        $entity->save();
        return $entity;
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'theme' => 'required',
                'title' => 'required',
                'body' => 'required'
            ],
            [
                'theme.required' => 'Необходимо указать тему',
                'title.required' => 'Необходимо указать заголовок',
                'body.required' => 'Необходимо указать основной текст'
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function kill($id)
    {
        $entity = Material::find($id);
        return $entity->delete();
    }

    //Eloquent: Relationships

    public function works()
    {
        return $this->belongsToMany('App\Work');
    }
}
