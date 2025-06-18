<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\TaskPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Task::class => TaskPolicy::class,
        //
    ];

    /**
     * registra la política de autorización para el modelo Task
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('task.delete', [TaskPolicy::class, 'delete']);
        Gate::define('task.viewAny', [TaskPolicy::class, 'viewAny']);
        Gate::define('task.view', [TaskPolicy::class, 'view']);
        Gate::define('task.create', [TaskPolicy::class, 'create']);
        Gate::define('task.update', [TaskPolicy::class, 'update']);
    }
}
