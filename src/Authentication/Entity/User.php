<?php
declare(strict_types=1);

namespace App\Authentication\Entity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Zestic\Contracts\User\UserInterface;

final class User implements UserInterface
{
    /** @var array */
    private $details;
    /** @var string */
    private $identity;
    /** @var string[] */
    private $roles;

    public function __construct(string $identity, array $roles = [], array $details = [])
    {
        $this->identity = $identity;
        $this->roles = $roles;
        $this->details = $details;
    }

    public function getId(): UuidInterface
    {
        return Uuid::fromString($this->details['id']);
    }

    public function getPersonId(): string
    {
        return $this->details['personId'];
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