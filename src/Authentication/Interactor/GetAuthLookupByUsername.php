<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\DbTableAuthAdapter;
use Zestic\Contracts\Authentication\AuthLookupInterface;

final class GetAuthLookupByUsername
{
    public function __construct(
        private DbTableAuthAdapter $authAdapter
    ) {
    }

    public function get($username): ?AuthLookupInterface
    {
        return $this->authAdapter->findAuthLookupByParameter('username', $username);
    }
}
