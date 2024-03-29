<?php
declare(strict_types=1);

namespace App\Authentication\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Zestic\Contracts\Authentication\AuthLookupInterface;

final class AuthLookup implements AuthLookupInterface
{
    public function __construct(
        private string $identity,
        private array $roles = [],
        private array $details = [],
    ) {
    }

    public function getId(): UuidInterface
    {
        return Uuid::fromString($this->details['id']);
    }

    public function getUserId()
    {
        return $this->details['userId'];
    }

    public function getDetail(string $name, $default = null)
    {
        return $this->details[$name] ?? $default;
    }

    public function getIdentity() : string
    {
        return $this->identity;
    }

    public function getRoles() : array
    {
        return $this->roles;
    }

    public function getDetails() : array
    {
        return $this->details;
    }
}
