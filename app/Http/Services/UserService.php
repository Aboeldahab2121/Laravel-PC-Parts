<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    public function createUser(array $userData)
    {
        $user = User::create($userData);
        // event firing placeholder

        return $user;
    }

    public function updateUser(array $userData, User $user)
    {
        $user->update($userData);
        // event firing placeholder

        return $user;
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        // event firing placeholder
    }
}
