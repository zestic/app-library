<?php
declare(strict_types=1);

namespace App\Authenticate;

use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Laminas\Db\Adapter\Adapter as DbAdapter;

final class DbTableAuthAdapter extends CallbackCheckAdapter
{
    public function __construct(
        DbAdapter $laminasDb,
        $tableName = null,
        $identityColumn = null,
        $credentialColumn = null,
        $credentialValidationCallback = null,
        private $hasRestrictedUsernames = false,
    ) {
        parent::__construct(
            $laminasDb,
            $tableName,
            $identityColumn,
            $credentialColumn,
            $credentialValidationCallback,
        );
    }

    public function getDbAdapter(): DbAdapter
    {
        return $this->laminasDb;
    }

    public function hasRestrictedUsernames(): bool
    {
        return $this->hasRestrictedUsernames;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }
}

