<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService extends Service
{
    public function createUser(string $name, string $email, string $password): int
    {
        $user = User::createNewUser($name, $email, $password);

        $userId = (new UserRepository())->add($user);

        return $userId;
    }
}
