<?php

namespace App\Http\Controllers\User;

use App\Discipline;
use App\Homework;
use App\Http\Controllers\UserController;
use App\Schoolkid;


class StatisticsController extends UserController
{

    public function index(Schoolkid $schoolkid)
    {
        $disciplines_to_show = $schoolkid->getKidDisciplines($this->user->schoolkid->id);

        return view('user.statistics', [
            'title' => 'Статистика',
            'disciplines' => $disciplines_to_show
        ]);
    }

    public function show($discipline_id)
    {
        $discipline = new Discipline();
        $discipline = $discipline->getOne($discipline_id);

        $homework = new Homework();
        $homeworks = $homework->getKidDisciplineHomeworks($this->user->schoolkid->id, $discipline_id);

        $schoolkid = new Schoolkid();
        $stat = $schoolkid->getStat($homeworks);

        $average_mark = $homework->percent_per_character($stat['average_percent']);

        return view('user.statistics.show', [
            'title' => $discipline->name . '. Статистика',
            'discipline' => $discipline,
            'homeworks_count' => $stat['homeworks_count'],
            'done_percent' => $stat['done_percent'],
            'average_percent' => $stat['average_percent'],
            'average_mark' => $average_mark,
        ]);
    }
}
