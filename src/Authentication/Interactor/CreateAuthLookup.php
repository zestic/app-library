<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\Interface\NewUserInterface;
use App\Exception\AuthLookupException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class CreateAuthLookup
{
    public function __construct(
        private \PDO $pdo,
    ) {
    }

    public function create(NewAuthLookupInterface $newAuthLookup): UuidInterface
    {
        $username = $newAuthLookup->getUsername();
        $query = $this->pdo->query("SELECT id FROM restricted_usernames WHERE username = '$username'");
        if ($query->fetch()) {
            throw new UserException("'$username' is a restricted username");
        }
        $id = Uuid::uuid4();
        $password = password_hash($newAuthLookup->getPassword(), PASSWORD_BCRYPT);
        $sql = <<<SQL
INSERT INTO users
    (email, id, password, username)
     VALUES ('{$newAuthLookup->getEmail()}', '{$id->toString()}', '$password', '$username');
SQL;
        if (1 === $this->pdo->exec($sql)) {
            return $id;
        }

        $err = $this->pdo->errorInfo();

        throw new AuthLookupException($err[2]);
    }
}
