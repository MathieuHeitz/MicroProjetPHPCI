<?php

namespace App\models;

class UserForRepoTest
{
    private ?int $id;
    private string $name;
    private string $email;

    public function __construct(string $name, string $email, ?int $id = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
}
