<?php

namespace App\Policies;

use App\Homework;
use App\User;
use App\Given_task;
use Illuminate\Auth\Access\HandlesAuthorization;

class Given_taskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the givenTask.
     *
     * @param  \App\User $user
     * @param  \App\Given_task $givenTask
     * @return mixed
     */
    public function view(User $user, Given_task $givenTask)
    {
        //
    }

    /**
     * Determine whether the user can create givenTasks.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the givenTask.
     *
     * @param  \App\User $user
     * @param  \App\Given_task $givenTask
     * @param  \App\Homework  $homework
     * @return mixed
     */
    public function update(User $user, Given_task $givenTask, Homework $homework)
    {
        if ($homework->computer_mark) {
            $pass = false;
        } else {
            ($homework->teacher_mark) ? $pass = false : $pass = true;
        }
        return (
            ($user->schoolkid->id === $givenTask->homework->schoolkid_id)
            &&
            ($pass)
        );
    }

    /**
     * Determine whether the user can delete the givenTask.
     *
     * @param  \App\User $user
     * @param  \App\Given_task $givenTask
     * @return mixed
     */
    public function delete(User $user, Given_task $givenTask)
    {
        //
    }
}
