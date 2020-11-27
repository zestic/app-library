<?php
declare(strict_types=1);

namespace App\Domain\Message\Query;

use IamPersistent\GraphQL\GraphQLMessage;

final class GetProfileMessage extends GraphQLMessage
{
    /** @var string */
    private $username;

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): GetProfileMessage
    {
        $this->username = $username;

        return $this;
    }
}
