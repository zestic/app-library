<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\DbTableAuthAdapter;

final class CheckForRestrictedUsername
{
    public function __construct(
        private DbTableAuthAdapter $authAdapter
    ) {
    }

    public function isRestricted(string $username): bool
    {
        $sql = <<<SQL
SELECT id 
FROM {$this->authAdapter->getTableName()}
WHERE username = '{$username}';
SQL;

        $dbAdapter = $this->authAdapter->getDbAdapter();
        $statement = $dbAdapter->createStatement($sql);
        $result    = $statement->execute();

        return true;
    }
}
