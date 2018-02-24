<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'discipline_id'
    ];

    public function getFIO($id)
    {
        $teacher = Teacher::find($id);
        $fio = $teacher->firstname . ' '
            . $teacher->middlename . ' '
            . $teacher->lastname;
        return $fio;
    }

    //Eloquent: Relationships

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }

    public function works()
    {
        return $this->hasMany('App\Work');
    }
}
