<?php
declare(strict_types=1);

namespace App\Authentication\Entity;

use App\Authentication\Interface\NewAuthLookupInterface;

final class NewAuthLookup implements NewAuthLookupInterface
{
    public function __construct(
        private string $email,
        private string $password,
        private string $username,
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
