<?php
declare(strict_types=1);

namespace App\Interactor;

use App\DTO\NewUser;
use App\Exception\UserException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class CreateUser
{
    /** @var \PDO */
    private $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['name'] . ';';
        $this->pdo = new \PDO($dsn, $config['user'], $config['password']);
    }

    public function create(NewUser $newUser): UuidInterface
    {
        $username = $newUser->getUsername();
        $query = $this->pdo->query("SELECT id FROM restricted_usernames WHERE username = '$username'");
        if ($query->fetch()) {
            throw new UserException("'$username' is a restricted username");
        }
        $id = Uuid::uuid4();
        $password = password_hash($newUser->getPassword(), PASSWORD_BCRYPT);
        $sql = <<<SQL
INSERT INTO users
    (email, id, password, username)
     VALUES ('{$newUser->getEmail()}', '{$id->toString()}', '$password', '$username');
SQL;
        if (1 === $this->pdo->exec($sql)) {
            return $id;
        }

        $err = $this->pdo->errorInfo();

        throw new UserException($err[2]);
    }
}
