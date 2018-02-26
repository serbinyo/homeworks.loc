<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function getAll()
    {
        return Grade::get();
    }

    public function getOne($id)
    {
        return  Grade::find($id);
    }

    public function showAll()
    {
        return Grade::orderBy('id')->paginate(10);
    }

    //Eloquent: Relationships

    public function schoolkids()
    {
        return $this->hasMany('App\Schoolkid');
    }
}
