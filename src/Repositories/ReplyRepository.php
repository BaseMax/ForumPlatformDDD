<?php

namespace App\Repositories;

use App\Models\Reply;

class ReplyRepository extends Repository
{
    public function all(int $thread_id): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM replies WHERE thread_id = ?"
        );

        $stmt->execute([$thread_id]);

        return $stmt->fetchAll();
    }

    public function get(int $thread_id, int $id): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM replies WHERE thread_id = ?, id = ?"
        );

        $stmt->execute([
            $thread_id,
            $id
        ]);

        return $stmt->fetchAll();
    }

    public function add(Reply $reply): int
    {
        $stmt = $this->db->prepare(
            "INSERT INTO replies SET (`user_id`, `thread_id`, `body`, `upvotes`, `downvotes`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $reply->getUserId(),
            $reply->getThreadId(),
            $reply->getBody(),
            $reply->getUpVotes(),
            $reply->getDownVotes(),
            $reply->getCreatedAt(),
            $reply->getUpdatedAt()
        ]);

        return $this->db->lastInsertId();
    }

    public function update(int $id, int $thread_id, array $values): void
    {
        $this->db->beginTransaction();

        $stmt = $this->db->prepare(
            "UPDATE replies SET user_id = ?, body = ?, upvotes = ?, downvotes = ?, created_at = ?, updated_at = ? WHERE id = ?, thread_id = ?"
        );

        $stmt->execute([
            $values["user_id"],
            $values["body"],
            $values["upvotes"],
            $values["downvotes"],
            $values["created_at"],
            $values["updated_at"],
            $id,
            $thread_id
        ]);

        $this->db->commit();
    }

    public function delete(int $id, int $thread_id): void
    {
        $stmt = $this->db->prepare(
            "DELETE FROM replies WHERE id = ?, thread_id = ?"
        );

        $stmt->execute([$id, $thread_id]);
    }
}
