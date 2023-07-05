<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Framework\Config;
use PDO;

class UserRepository extends Repository
{
    private $db;

    public function __construct()
    {
        $config = Config::getEnv();

        $this->db = new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']}",
            $config["user"],
            $config["password"]
        );
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
