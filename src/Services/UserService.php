<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService extends Service
{
    public function createUser(string $name, string $email, string $password)
    {
        $user = User::createNewUser($name, $email, $password);

        (new UserRepository())->add($user);
    }
}
