<?php

namespace App\Policies;

use App\Models\TaskJob;
use App\Models\User;

class TaskJobPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, TaskJob $job)
    {
        
        return $user->id === $job->user_id;
    }
}
