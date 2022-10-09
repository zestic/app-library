<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\DbTableAuthAdapter;

final class DoesUserExist
{
    public function __construct(
        private CheckForRestrictedUsername $checkForRestrictedUsername,
        private DbTableAuthAdapter $authAdapter,
    ) {
    }

    public function isEmailAvailable(string $email): bool
    {
        $sql = <<<SQL
SELECT id 
FROM {$this->authAdapter->getTableName()}
WHERE email = '$email'
SQL;

        $dbAdapter = $this->authAdapter->getDbAdapter();
        $statement = $dbAdapter->createStatement($sql);
        $result    = $statement->execute();

        return !(bool) $result->getAffectedRows();
    }

    public function isUsernameAvailable(string $username): bool
    {
        if ($this->checkForRestrictedUsername->isRestricted($username)) {
            return false;
        }

        $sql = <<<SQL
SELECT id 
FROM {$this->authAdapter->getTableName()}
WHERE {$this->authAdapter->getIdentityColumn()} = '{$username}';
SQL;

        $dbAdapter = $this->authAdapter->getDbAdapter();
        $statement = $dbAdapter->createStatement($sql);
        $result    = $statement->execute();

        return !(bool) $result->getAffectedRows();
    }
}
