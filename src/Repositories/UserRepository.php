<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Framework\Config;
use PDO;

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add(User $user): int
    {
        $this->db->beginTransaction();

        try {
            $stmt = $this->db->prepare(
                "INSERT INTO users (`name`, `email`, `password`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $user->getName(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getCreatedAt(),
                $user->getUpdatedAt()
            ]);

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();

            throw new Exception($e->getMessage());
        }

        return $this->db->lastInsertId();
    }
}
