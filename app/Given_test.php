<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Given_test extends Model
{



    //Eloquent: Relationships

    public function homeworks()
    {
        return $this->belongsToMany('App\Work');
    }
}
