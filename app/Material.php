<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Material extends Model
{
    protected $fillable = [
        'teachers_id', 'theme', 'image', 'title', 'body'
    ];

    public function showAll()
    {
        $entities = DB::table('materials')->orderBy('id', 'desc')->paginate(10);
        return $entities;
    }

    public function store($data, $teachers_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $newMaterial = [
            'teachers_id' => $teachers_id,
            'theme' => $data['theme'],
            'image' => $data['image'],
            'title' => $data['title'],
            'body' => $data['body']
        ];
        $this->fill($newMaterial);
        $this->save();
        return $this;
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

        if ($data['image'] == '') {
            $data['image'] = 'no image';
        }

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function kill($id)
    {
        $entity = self::find($id);
        $entity->delete();
    }
}
