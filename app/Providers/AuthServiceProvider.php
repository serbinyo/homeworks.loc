<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Task' => 'App\Policies\TaskPolicy',
        'App\Test' => 'App\Policies\TestPolicy',
        'App\Material' => 'App\Policies\MaterialPolicy',
        'App\Work' => 'App\Policies\WorkPolicy',
        'App\Teacher' => 'App\Policies\TeacherPolicy',
        'App\Homework' => 'App\Policies\HomeworkPolicy',
        'App\Given_task' => 'App\Policies\Given_taskPolicy',
        'App\Given_test' => 'App\Policies\Given_testPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
