<?php

namespace App\Policies;

use App\Homework;
use App\User;
use App\Given_test;
use Illuminate\Auth\Access\HandlesAuthorization;

class Given_testPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the givenTest.
     *
     * @param  \App\User  $user
     * @param  \App\Given_test  $givenTest
     * @return mixed
     */
    public function view(User $user, Given_test $givenTest)
    {
        //
    }

    /**
     * Determine whether the user can create givenTests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the givenTest.
     *
     * @param  \App\User  $user
     * @param  \App\Given_test  $givenTest
     * @param  \App\Homework  $homework
     * @return mixed
     */
    public function update(User $user, Given_test $givenTest, Homework $homework)
    {
        if ($homework->computer_mark) {
            $pass = false;
        } else {
            ($homework->teacher_mark) ? $pass = false : $pass = true;
        }
        return (
            ($user->schoolkid->id === $givenTest->homework->schoolkid_id)
            &&
            ($pass)
        );
    }

    /**
     * Determine whether the user can delete the givenTest.
     *
     * @param  \App\User  $user
     * @param  \App\Given_test  $givenTest
     * @return mixed
     */
    public function delete(User $user, Given_test $givenTest)
    {
        //
    }
}
