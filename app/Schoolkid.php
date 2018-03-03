<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolkid extends Model
{

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
        $entity = $this->find($id);
        return $entity;
    }

    public function hasHomework($work)
    {
        return $this->works()->where('work_id', $work->id)->exists();
    }

    public function setHomework($work, $date)
    {
        $this->works()->attach($work, ['date_to_completion' => $date]);
        // get inserted Identifier of pivot when attach()
        // Получаем Id записи в промежуточной таблице ( pivot ) после выполнения attach()
        $homework_id = $this->works()->withPivot('id')->wherePivot('work_id',$work->id)->first()->pivot->id;
        return $homework_id;
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

    public function homeworks()
    {
        return $this->hasMany('App\Homework');
    }
}
