<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\DbTableAuthAdapter;
use Zestic\Contracts\User\UserInterface;

final class GetUserByPersonId
{
    public function __construct(
        private DbTableAuthAdapter $authAdapter
    ) {
    }

    public function get($personId): ?UserInterface
    {
        return $this->authAdapter->findUserByParameter('person_id', $personId);
    }
}
