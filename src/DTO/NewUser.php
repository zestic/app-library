<?php
declare(strict_types=1);

namespace App\DTO;

final class NewUser
{
    /** @var string */
    public $email;
    /** @var string */
    public $password;
    /** @var string */
    public $username;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): NewUser
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): NewUser
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): NewUser
    {
        $this->username = $username;

        return $this;
    }
}
