<?php

namespace App\Models;

class User extends Model
{
    private ?int $id;
    private string $name;
    private string $email;
    private string $password;
    private int $created_at;
    private int $updated_at;

    public static function createNewUser(string $name, string $email, string $password): static
    {
        return new static($name, $email, $password, time(), time());
    }

    public function __construct(string $name, string $email, string $password, int $created_at, int $updated_at)
    {
        $this->setName($name)
            ->setEmail($email)
            ->setPassword($password)
            ->setCreatedAt($created_at)
            ->setUpdatedAt($updated_at);
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return $this;
    }

    private function setCreatedAt(int $timestamp): self
    {
        $this->created_at = $timestamp;
        return $this;
    }

    private function setUpdatedAt(int $timestamp): self
    {
        $this->updated_at = $timestamp;
        return $this;
    }

    public function get(): array
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "created_at" => $this->getCreatedAt(),
            "updated_at" => $this->getUpdatedAt()
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
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
