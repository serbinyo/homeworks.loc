<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function getAll()
    {
        return $this->get();
    }

    public function getOne($id)
    {
        return  $this->find($id);
    }

    public function showAll()
    {
        return $this->orderBy('id')->paginate(10);
    }

    //Eloquent: Relationships

    public function schoolkids()
    {
        return $this->hasMany('App\Schoolkid');
    }
}
