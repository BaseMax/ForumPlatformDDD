<?php

namespace App\Repositories;

use App\Models\Moderator;

class ModeratorRepository extends Repository
{
    public function all(): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM moderators"
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete(int $user_id): void
    {
        $stmt = $this->db->prepare(
            "DELETE FROM moderators WHERE user_id = ?"
        );

        $stmt->execute([$user_id]);
    }

    public function add(Moderator $moderator): int
    {
        $this->db->beginTransaction();

        $stmt = $this->db->prepare(
            "INSERT INTO moderators SET (`user_id`, `created_at`, `updated_at`) VALUES (?, ?, ?)"
        );

        $stmt->execute([
            $moderator->getUserId(),
            $moderator->getCreatedAt(),
            $moderator->getUpdatedAt()
        ]);

        $this->db->commit();

        return $this->db->lastInsertId();
    }
}
