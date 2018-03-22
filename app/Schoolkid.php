<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getAllPaginated($num)
    {
        $entities = $this->orderBy('lastname')->paginate($num);
        return $entities;
    }

    public function hasHomework($work)
    {
        return $this->works()->where('work_id', $work->id)->exists();
    }

    public function setHomework($work, $teacher_id,$date)
    {
        $this->works()->attach($work, ['teacher_id' => $teacher_id, 'date_to_completion' => $date]);
        // get inserted Identifier of pivot when attach()
        // Получаем Id записи в промежуточной таблице ( pivot ) после выполнения attach()
        $homework_id = $this->works()->withPivot('id')->wherePivot('work_id',$work->id)->first()->pivot->id;
        return $homework_id;
    }

    public function getKidDisciplines($schoolkid_id)
    {
        $entities = $this
            ->join('homeworks', 'schoolkids.id', '=', 'homeworks.schoolkid_id')
            ->join('works', 'homeworks.work_id', '=', 'works.id')
            ->join('teachers', 'works.teacher_id', '=', 'teachers.id')
            ->join('disciplines', 'teachers.discipline_id', '=', 'disciplines.id')
            ->where('schoolkids.id', $schoolkid_id)
            ->select('disciplines.*')
            ->distinct()
            ->get();
        return $entities;
    }

    public function kill($id)
    {
        $entity = $this->find($id);
        DB::beginTransaction();

        $entity->user()->delete();

        DB::commit();
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
