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

    public function update(int $id, array $values): void
    {
        $this->db->beginTransaction();

        $stmt = $this->db->prepare(
            "UPDATE threads SET user_id = ?, title = ?, body = ?, upvotes = ?, downvotes = ?, created_at = ?, updated_at = ? WHERE id = ?"
        );

        $stmt->execute(
            $values["user_id"],
            $values["title"],
            $values["body"],
            $values["upvotes"],
            $values["downvotes"],
            $values["created_at"],
            $values["updated_at"],
            $id
        );

        $this->db->commit();
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare(
            "DELETE FROM threads WHERE id = ?"
        );

        $stmt->execute([$id]);
    }
}
