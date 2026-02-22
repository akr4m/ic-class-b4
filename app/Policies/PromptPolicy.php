<?php

namespace App\Policies;

use App\Models\Prompt;
use App\Models\User;

class PromptPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Prompt $prompt): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        if ($prompt->is_public) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function daldkjbaskjdba(User $user): bool
    {
        dd('here');

        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Prompt $prompt): bool
    {
        if ($user->role === 'admin' && $prompt->user_id === $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Prompt $prompt): bool
    {
        if ($user->role === 'admin' && $prompt->user_id === $user->id) {
            return true;
        }

        return false;
    }
}
