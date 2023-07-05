<?php

namespace App\Models;

class Moderator extends Model
{
    private int $user_id;
    private int $created_at;
    private int $updated_at;

    public static function createNewModerate(int $user_id): static
    {
        return new static($user_id, time(), time());
    }

    public function __construct(int $user_id, int $created_at, int $updated_at)
    {
        $this->setUserId($user_id)
            ->setCreatedAt($created_at)
            ->setUpdatedAt($updated_at);
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setCreatedAt(int $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function setUpdatedAt(int $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): int
    {
        return $this->updated_at;
    }
}
