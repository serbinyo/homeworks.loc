<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    public function getAll()
    {
        return DB::table('grades')->get();
    }

    public function getOne($id)
    {
        $entity = Grade::find($id);
        return $entity;
    }

    public function showAll()
    {
        $entities = DB::table('grades')->orderBy('id')->paginate(10);
        return $entities;
    }

    //Eloquent: Relationships

    public function schoolkids()
    {
        return $this->hasMany('App\Schoolkid');
    }
}
