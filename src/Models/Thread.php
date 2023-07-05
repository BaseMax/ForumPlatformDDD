<?php

namespace App\Models;

class Thread extends Model
{
    private ?int $id;
    private int $user_id;
    private string $title;
    private string $body;
    private int $upvotes;
    private int $downvotes;
    private int $created_at;
    private int $updated_at;

    public function __construct(int $user_id, string $title, string $body, int $upvotes, int $downvotes, int $created_at, int $updated_at)
    {
        $this->setUserId($user_id)
            ->setTitle($title)
            ->setBody($body)
            ->setUpVotes($upvotes)
            ->setDownVotes($downvotes)
            ->setCreatedAt($created_at)
            ->setUpdatedAt($updated_at);
    }

    public static function createNewThread(int $user_id, string $title, string $body, int $upvotes, int $downvotes): self
    {
        return new static($user_id, $title, $body, $upvotes, $downvotes, time(), time());
    }

    public function setUserId(int $id): self
    {
        $this->user_id = $id;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
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

    public function setDownVotes(int $downVotes): self
    {
        $this->downvotes = $downVotes;
        return $this;
    }

    public function setCreatedAt(int $timestamp): self
    {
        $this->created_at = $timestamp;
        return $this;
    }

    public function setUpdatedAt(int $timestamp): self
    {
        $this->updated_at = $timestamp;
        return $this;
    }

    public function getUserId(): int 
    {
        return $this->user_id;
    }

    public function getTitle(): string
    {
        return $this->title;
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
