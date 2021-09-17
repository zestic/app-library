<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\DbTableAuthAdapter;
use Zestic\Contracts\Authentication\AuthLookupInterface;

final class GetAuthLookupByUserId
{
    public function __construct(
        private DbTableAuthAdapter $authAdapter
    ) {
    }

    public function get($userId): ?AuthLookupInterface
    {
        return $this->authAdapter->findAuthLookupByParameter('user_id', $userId);
    }
}
