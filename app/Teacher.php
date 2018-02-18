<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher  extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'disciplines_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFIO($id)
    {
        $teacher = Teacher::find($id);
        $fio = $teacher->firstname . ' '
            . $teacher->middlename . ' '
            . $teacher->lastname;
        return $fio;
    }
}
