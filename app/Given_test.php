<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Given_test extends Model
{
    protected $fillable = [
        'homework_id', 'theme', 'task', 'option_a', 'option_b', 'option_c', 'option_d', 'answer', 'standard'
    ];

    public function store($standard_test, $homework_id)
    {
        $newGivenTest = [
            'homework_id' => $homework_id,
            'theme' => $standard_test['theme'],
            'task' => $standard_test['task'],
            'option_a' => $standard_test['option_a'],
            'option_b' => $standard_test['option_b'],
            'option_c' => $standard_test['option_c'],
            'option_d' => $standard_test['option_d'],
            'standard' => $standard_test['answer']
        ];
        $this->fill($newGivenTest);
        $this->save();
        return $this;
    }

    //Eloquent: Relationships

    public function homework()
    {
        return $this->belongsTo('App\Homework');
    }
}
