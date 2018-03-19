<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function getAll()
    {
        return $this->orderBy('name')->get();
    }

    public function getOne($id)
    {
        return  $this->find($id);
    }

    public function showAll()
    {
        $entities = $this->orderBy('id')->paginate(10);
        return $entities;
    }

    //Eloquent: Relationships

    public function teachers()
    {
        return $this->hasMany('App\Teacher', 'discipline_id');
    }
}
