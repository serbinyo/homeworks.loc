<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public function getAll()
    {
        return Discipline::get();
    }

    public function showAll()
    {
        $entities = Discipline::orderBy('id')->paginate(10);
        return $entities;
    }

    //Eloquent: Relationships

    public function teachers()
    {
        return $this->hasMany('App\Teacher', 'discipline_id');
    }
}
