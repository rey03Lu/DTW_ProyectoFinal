<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole('admin') || $user->hasRole('user');
    }

    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id || $user->hasRole('admin');
    }

    public function create(User $user)
    {
        return $user->hasRole('user');
    }

    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id || $user->hasRole('admin');
    }

    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id || $user->hasRole('admin');
    }
}
