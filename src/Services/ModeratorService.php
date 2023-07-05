<?php

namespace App\Services;

use App\Models\Moderator;
use App\Repositories\ModeratorRepository;

class ModeratorService extends Service
{
    public function all(): array
    {
        return (new ModeratorRepository())->all();
    }

    public function delete(int $user_id): void
    {
        return (new ModeratorRepository())->delete($user_id);
    }

    public function add(array $values): int
    {
        $moderator = Moderator::createNewModerate($values["user_id"]);

        $moderatorId = (new ModeratorRepository())->add($moderator);

        return $moderatorId;
    }
}
