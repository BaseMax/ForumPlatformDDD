<?php

namespace App\Models;

class Reply extends Model
{
    private ?int $id;
    private int $user_id;
    private int $thread_id;
    private string $body;
    private int $upvotes;
    private int $downvotes;
    private int $created_at;
    private int $updated_at;


    public static function createNewReply(int $user_id, int $thread_id, string $body, int $upvotes, int $downvotes): self
    {
        return new static($user_id, $thread_id, $body, $upvotes, $downvotes, time(), time());
    }

    public function __construct(int $user_id, int $thread_id, string $body, int $upvotes, int $downvotes, int $created_at, int $updated_at)
    {
        $this->setUserId($user_id)
            ->setThreadId($thread_id)
            ->setBody($body)
            ->setUpVotes($upvotes)
            ->setDownVotes($downvotes)
            ->setCreatedAt($created_at)
            ->setUpdatedAt($updated_at);
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setThreadId(int $thread_id): self
    {
        $this->thread_id = $thread_id;
        return $this;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function setUpVotes(int $upvotes): self
    {
        $this->upvotes = $upvotes;
        return $this;
    }

    public function setDownVotes(int $downvotes): self
    {
        $this->downvotes = $downvotes;
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

    public function getThreadId(): int
    {
        return $this->thread_id;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getUpVotes(): int
    {
        return $this->upvotes;
    }

    public function getDownVotes(): int
    {
        return $this->downvotes;
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
