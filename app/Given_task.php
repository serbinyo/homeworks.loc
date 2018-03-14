<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Given_task extends Model
{

    protected $fillable = [
        'homework_id', 'theme', 'task', 'answer', 'standard'
    ];

    public function store($data, $homework_id)
    {

        $newGivenTask = [
            'homework_id' => $homework_id,
            'theme' => $data['theme'],
            'task' => $data['task'],
            'standard' => $data['answer']
        ];
        $this->fill($newGivenTask);
        $this->save();
        return $this;
    }

    public function getOne($id)
    {
        $entity = $this->find($id);
        return $entity;
    }


    //Eloquent: Relationships

    public function homework()
    {
        return $this->belongsTo('App\Homework');
    }
}
