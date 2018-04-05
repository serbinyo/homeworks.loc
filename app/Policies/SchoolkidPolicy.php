<?php

namespace App\Policies;

use App\User;
use App\Schoolkid;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolkidPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schoolkid.
     *
     * @param  \App\User  $user
     * @param  \App\Schoolkid  $schoolkid
     * @return mixed
     */
    public function view(User $user, Schoolkid $schoolkid)
    {
        return $user->schoolkid->id === $schoolkid->id;
    }

    /**
     * Determine whether the user can create schoolkids.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the schoolkid.
     *
     * @param  \App\User  $user
     * @param  \App\Schoolkid  $schoolkid
     * @return mixed
     */
    public function update(User $user, Schoolkid $schoolkid)
    {
        return $user->schoolkid->id === $schoolkid->id;
    }

    /**
     * Determine whether the user can delete the schoolkid.
     *
     * @param  \App\User  $user
     * @param  \App\Schoolkid  $schoolkid
     * @return mixed
     */
    public function delete(User $user, Schoolkid $schoolkid)
    {
        //
    }
}
