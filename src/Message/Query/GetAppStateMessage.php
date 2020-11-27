<?php
declare(strict_types=1);

namespace App\Domain\Message\Query;

use IamPersistent\GraphQL\GraphQLMessage;
use Zapi\Entity\Id;

final class GetAppStateMessage extends GraphQLMessage
{
    /** @var string */
    private $personId;

    public function getPersonId(): Id
    {
        return new Id($this->personId);
    }
}
