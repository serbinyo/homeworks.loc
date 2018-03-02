<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Given_task extends Model
{



    //Eloquent: Relationships

    public function homeworks()
    {
        return $this->belongsToMany('App\Homework');
    }
}
