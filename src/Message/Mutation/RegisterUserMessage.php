<?php
declare(strict_types=1);

namespace App\Domain\Message\Mutation;

use IamPersistent\GraphQL\GraphQLMessage;
use Zapi\Interfaces\SignUpDataInterface;

final class RegisterUserMessage extends GraphQLMessage implements SignUpDataInterface
{
    private string $email;
    private string $name;
    private string $password;
    private string $referralCode;
    private string $username;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getReferralCode(): string
    {
        return $this->referralCode;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}
