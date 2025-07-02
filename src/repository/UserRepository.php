<?php
namespace App\repository;

use App\models\UserForRepoTest;

class UserRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(UserForRepoTest $user): void
    {
        if ($user->getId() !== null) {
            $stmt = $this->pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $stmt->execute([
                ':name' => $user->getName(),
                ':email' => $user->getEmail(),
                ':id' => $user->getId(),
            ]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
            $stmt->execute([
                ':name' => $user->getName(),
                ':email' => $user->getEmail(),
            ]);
            $user->setId((int)$this->pdo->lastInsertId());
        }
    }

    public function find(int $id): ?UserForRepoTest
    {
        $stmt = $this->pdo->prepare("SELECT id, name, email FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) return null;

        return new UserForRepoTest($row['name'], $row['email'], (int)$row['id']);
    }
}
