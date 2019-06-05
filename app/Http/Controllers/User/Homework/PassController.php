<?php

namespace App\Http\Controllers\User\Homework;

use App\Homework;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class PassController extends UserController
{
    public function pass(Request $request)
    {
        $data = $request->except('_token');

        $homework = new Homework();
        $homework_to_pass = $homework->getOne($data['homework_id']);

        if ($this->user->can('pass', $homework_to_pass)) {

            $tasks = $homework_to_pass->given_tasks;
            $tasks_num = $tasks->count();
            $tasks_correct_num = $tasks->where('correct_flag', 1)->count();

            $tests = $homework_to_pass->given_tests;
            $tests_num = $tests->count();
            $tests_correct_num = $tests->where('correct_flag', 1)->count();

            //Если задана пустая работа, ученик сдавая ее получает 100%
            if (($tasks_num + $tests_num) !== 0) {
                $mark = ($tasks_correct_num + $tests_correct_num) / ($tasks_num + $tests_num) * 100;
                $mark = round($mark, 2);
            } else {
                $mark = 100;
            }

            $homework->evaluate($data['homework_id'], $mark);

            $message = 'Оценка посчитана';
            return redirect(route('hometask.show', [
                'discipline_id' => $data['discipline_id'],
                'date' => $data['date'],
                'id' => $data['homework_id'],
            ]))->with('status', $message);
        }
    }

    public function setMarkPercent($tasks_correct_num, $tests_correct_num, $tasks_num, $tests_num)
    {
        return round(($tasks_correct_num + $tests_correct_num) / ($tasks_num + $tests_num) * 100, 2);
    }
}
