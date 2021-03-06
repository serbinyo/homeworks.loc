<?php

namespace App\Http\Controllers\User\Homework;

use App\Http\Controllers\UserController;
use App\Schoolkid;
use App\Homework;

class UsrChoiceController extends UserController
{

    public function index(Schoolkid $schoolkid)
    {
        $disciplines_to_show = $schoolkid->getKidDisciplines($this->user->schoolkid->id);

        return view('user.homeworks', [
            'title' => 'Выбор предмета',
            'disciplines' => $disciplines_to_show
        ]);
    }

    public function show_dates($discipline_id)
    {
        $homework = new Homework();
        $homework_dates = $homework->getKidDisciplineDates($this->user->schoolkid->id, $discipline_id);

        return view('user.homework.calendar', [
            'title' => 'Выбор даты',
            'discipline_id' => $discipline_id,
            'dates' => $homework_dates
        ]);
    }

    public function show_homeworks($discipline_id, $date)
    {
        $homework = new Homework();
        $homeworks_to_show = $homework->getByDateForKid($this->user->schoolkid->id, $discipline_id, $date);

        if ($homeworks_to_show->count() === 1) {
            $homework_to_show = $homeworks_to_show->first();
            $date = $homework_to_show->date_to_completion;
            return redirect(route('hometask.show', [
                'discipline_id' => $discipline_id,
                'date' => $date,
                'id' => $homework_to_show->id,
            ]));

        };

        return view('user.homework.homeworks_for_kid', [
            'title' => 'Домашние задания',
            'discipline_id' => $discipline_id,
            'date' => $date,
            'homeworks' => $homeworks_to_show
        ]);
    }
}
