<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

final class DoesUserExist
{
    /** @var \PDO */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function isEmailAvailable(string $email): bool
    {
        $query = $this->pdo->query("SELECT id FROM users WHERE email = '$email'");

        return !(bool) $query->fetch();
    }

    public function isUsernameAvailable(string $username): bool
    {
        $query = $this->pdo->query("SELECT id FROM restricted_usernames WHERE username = '$username'");
        if ($query->fetch()) {
            return false;
        }

        $query = $this->pdo->query("SELECT id FROM users WHERE username = '$username'");

        return !(bool) $query->fetch();
    }
}
