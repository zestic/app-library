<?php
declare(strict_types=1);

namespace App\Domain\Message\Query;

use IamPersistent\GraphQL\GraphQLMessage;

final class IsEmailAddressAvailableMessage extends GraphQLMessage
{
    /** @var string */
    private $email;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): IsUsernameAvailableMessage
    {
        $this->email = $email;

        return $this;
    }
}
