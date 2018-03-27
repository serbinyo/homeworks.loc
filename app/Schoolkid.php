<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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

    public function setHomework($work, $teacher_id, $date)
    {
        $this->works()->attach($work, ['teacher_id' => $teacher_id, 'date_to_completion' => $date]);
        // get inserted Identifier of pivot when attach()
        // Получаем Id записи в промежуточной таблице ( pivot ) после выполнения attach()
        $homework_id = $this->works()->withPivot('id')->wherePivot('work_id', $work->id)->first()->pivot->id;
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

    public function edit($id, $data)
    {
        $entity = $this->find($id);

        if ($err = $this->validate($data, $entity->user->id)) {
            return $err;
        }

        DB::beginTransaction();

        $entity->user->email = $data['email'];
        if (isset($data['login'])) {
            $entity->user->login = $data['login'];
        }

        $email_is_change = $entity->user->isDirty();
        $entity->user->save();

        $entity->firstname = $data['firstname'];
        $entity->middlename = $data['middlename'];
        $entity->lastname = $data['lastname'];
        if (isset($data['grade'])) {
            $entity->grade_id = $data['grade'];
        }

        $data_is_change = $entity->isDirty();
        $entity->save();

        DB::commit();

        if ($email_is_change || $data_is_change) {
            return $entity;
        } else {
            return ['errors' => ['no_chenge' => 'Изменений нет']];
        }
    }

    public function validate($data, $id)
    {
        $validator = Validator::make($data,
            [
                'email' =>
                    [
                        'nullable',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore($id)
                    ],
                'login' =>
                    [
                        'max:255',
                        Rule::unique('users')->ignore($id)
                    ],
                'firstname' => 'required|string|max:255',
                'middlename' => 'max:255',
                'lastname' => 'required|string|max:255'
            ],
            [
                'email.unique' => 'Почта занята',
                'login.unique' => 'Логин занят',
                //todo прописать ошибки валидации на русском
            ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
    }

    public function getStat($homeworks)
    {
        $homeworks_count = $homeworks->count();
        $done_homeworks_count = $homeworks->where('computer_mark', '!=', NULL)->count();

        $done_percent = ($done_homeworks_count / $homeworks_count) * 100;
        $done_percent = round($done_percent, 2);
        $sum_of_marks = 0;

        foreach ($homeworks as $homework) {
            if (!empty($homework->teacher_mark))
                $sum_of_marks = $sum_of_marks + $homework->teacher_mark;
            else
                $sum_of_marks = $sum_of_marks + $homework->computer_mark;
        }

        $average_percent = ($sum_of_marks / $homeworks_count);
        $average_percent = round($average_percent, 2);

        return [
            'homeworks_count' => $homeworks_count,
            'done_percent' => $done_percent,
            'average_percent' => $average_percent,
        ];
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
