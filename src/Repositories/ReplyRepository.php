<?php

namespace App\Repositories;

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
}