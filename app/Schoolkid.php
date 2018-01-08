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
        'firstname','middlename', 'lastname', 'class', 'parants_contacts'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
