<?php

namespace App\Services;

use App\Models\Thread;
use App\Repositories\ThreadRepository;

class ThreadService extends Service
{
    public function all(): array
    {
        return (new ThreadRepository())->getAll();
    }

    public function get(int $id): array|bool
    {
        return (new ThreadRepository())->getById($id);
    }

    public function createThread(int $user_id, string $title, string $body, int $upvotes, int $downvotes): int
    {
        $thread = Thread::createNewThread($user_id, $title, $body, $upvotes, $downvotes);

        $threadId = (new ThreadRepository())->add($thread);

        return $threadId;
    }

    public function update(int $id, array $values): array
    {
        (new ThreadRepository())->update($id, $values);

        return $this->get($id);
    }

    public function delete(int $id): void
    {
        (new ThreadRepository())->delete($id);
    }
}
