<?php

namespace App\Repositories;

use App\Models\Thread;

class ThreadRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM threads;"
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById(int $id): array|bool
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM threads WHERE id = ?"
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function add(Thread $thread): int
    {
        $this->db->beginTransaction();

        $stmt = $this->db->prepare(
            "INSERT INTO threads (`user_id`, `title`, `body`, `upvotes`, `downvotes`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $thread->getUserId(),
            $thread->getTitle(),
            $thread->getBody(),
            $thread->getUpVotes(),
            $thread->getDownVotes(),
            $thread->getCreatedAt(),
            $thread->getUpdatedAt()
        ]);

        $this->db->commit();

        return $this->db->lastInsertId();
    }
}
