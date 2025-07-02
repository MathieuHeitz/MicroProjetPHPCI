<?php
namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use App\repository\UserRepository;
use App\models\UserForRepoTest;

class UserRepositoryTest extends TestCase
{
    private ?\PDO $pdo;
    private UserRepository $repository;

    protected function setUp(): void
    {
        $dsn = getenv('DB_DSN') ?: 'sqlite::memory:';
        var_dump($dsn);
    
        try {
            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $e) {
            echo "PDO connection failed: ", $e->getMessage(), PHP_EOL;
            exit(1); 
        }
    
        $this->pdo->exec("
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                email TEXT NOT NULL
            )
        ");
    
        $this->repository = new UserRepository($this->pdo);
    }
    
    
    

    protected function tearDown(): void
    {
        $this->pdo = null;
    }

    public function testSaveAndFindUser(): void
    {

        $user = new UserForRepoTest('Alice', 'alice@example.com');

        $this->repository->save($user);

        $this->assertNotNull($user->getId());

        $savedUser = $this->repository->find($user->getId());

        $this->assertNotNull($savedUser);
        $this->assertSame($user->getId(), $savedUser->getId());
        $this->assertSame($user->getName(), $savedUser->getName());
        $this->assertSame($user->getEmail(), $savedUser->getEmail());

    }
}
