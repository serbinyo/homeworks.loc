<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;

class Work extends Model
{
    protected $fillable = [
        'teacher_id', 'theme'
    ];

    public function getAllPaginated()
    {
        $entities = self::orderBy('id', 'desc')->paginate(10);
        return $entities;
    }

    public function getDisciplineWorksPaginated($discipline_id)
    {
        $entities = DB::table('works')
            ->join('teachers', 'works.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('disciplines.id', $discipline_id)
            ->select('works.*')
            ->orderBy('works.id', 'desc')
            ->paginate(10);
        return $entities;
    }

    public function getTeacherWorks($teacher_id)
    {
        $entities = DB::table('works')
            ->join('teachers', 'works.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('teachers.id', $teacher_id)
            ->select('works.*')
            ->orderBy('works.id', 'desc')
            ->get();
        return $entities;
    }

    public function getOne($id)
    {
        $entity = Work::find($id);
        return $entity;
    }

    public function store($data, $teacher_id)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $newWork = [
            'teacher_id' => $teacher_id,
            'theme' => $data['theme'],
        ];
        $this->fill($newWork);
        $this->save();
        return $this;
    }

    public function edit($id, $user_id, $data)
    {
        if ($err = $this->validate($data)) {
            return $err;
        }

        $entity = Work::find($id);

        $entity->teacher_id = $user_id;
        $entity->theme = $data['theme'];

        $entity->save();
        return $entity;
    }

    public function validate($data)
    {
        $validator = Validator::make($data,
            [
                'theme' => 'required',
            ],
            [
                'theme.required' => 'Необходимо указать тему',
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function kill($id)
    {
        $entity = Work::find($id);
        return $entity->delete();
    }

    //Eloquent: Relationships

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }

    public function tests()
    {
        return $this->belongsToMany('App\Test');
    }

    public function materials()
    {
        return $this->belongsToMany('App\Material');
    }

    public function schoolkids()
    {
        return $this->belongsToMany('App\Schoolkid', 'homeworks')
            ->withPivot('date_to_completion')
            ->withTimestamps();
    }
}
