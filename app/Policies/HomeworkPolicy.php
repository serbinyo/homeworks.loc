<?php

namespace App\Policies;

use App\User;
use App\Homework;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomeworkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the homework.
     *
     * @param  \App\User $user
     * @param  \App\Homework $homework
     * @return mixed
     */
    public function view(User $user, Homework $homework)
    {
        if (isset($user->teacher))
            return $user->teacher->id === $homework->teacher_id;
        if (isset($user->schoolkid))
            return $user->schoolkid->id === $homework->schoolkid_id;
    }

    /**
     * Determine whether the user can create homeworks.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the homework.
     *
     * @param  \App\User $user
     * @param  \App\Homework $homework
     * @return mixed
     */
    public function update(User $user, Homework $homework)
    {
        //
    }

    /**
     * Determine whether the user can delete the homework.
     *
     * @param  \App\User $user
     * @param  \App\Homework $homework
     * @return mixed
     */
    public function delete(User $user, Homework $homework)
    {
        //
    }

    /**
     * Determine whether the user can update the homework.
     *
     * @param  \App\User $user
     * @param  \App\Homework $homework
     * @return mixed
     */
    public function pass(User $user, Homework $homework)
    {
        return $user->schoolkid->id === $homework->schoolkid_id;
    }

    /**
     * Determine whether the user can update the homework.
     *
     * @param  \App\User $user
     * @param  \App\Homework $homework
     * @return mixed
     */
    public function edit_mark(User $user, Homework $homework)
    {
        return (($user->teacher->id === $homework->teacher_id)
            &&
            ($homework->computer_mark));
    }
}
