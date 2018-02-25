<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Schoolkid extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'grade_id'
    ];

    public function getOne($id)
    {
        $entity = Schoolkid::find($id);
        return $entity;
    }

    public function hasHomework($kid, $work)
    {
        return $kid->works()->where('work_id', $work->id)->exists();
    }

    public function setHomework($kid, $work, $date)
    {
        return $kid->works()->attach($work, ['date_to_completion' => $date]);
    }

    //Eloquent: Relationships

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function works()
    {
        return $this->belongsToMany('App\Work', 'homeworks')
            ->withPivot('date_to_completion')
            ->withTimestamps();
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
}
