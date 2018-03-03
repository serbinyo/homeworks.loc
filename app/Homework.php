<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = [
        'computer_mark', 'teacher_comment', 'teacher_mark'
    ];


    //Eloquent: Relationships

    public function schoolkid()
    {
        return $this->belongsTo('App\Schoolkid');
    }

    public function given_tasks()
    {
        return $this->belongsToMany('App\Given_task');
    }

    public function given_tests()
    {
        return $this->belongsToMany('App\Given_test');
    }
}
