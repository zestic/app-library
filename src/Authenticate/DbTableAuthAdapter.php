<?php
declare(strict_types=1);

namespace App\Authenticate;

use App\Entity\User;
use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Laminas\Authentication\Result;
use Laminas\Db\Adapter\Adapter as DbAdapter;

final class DbTableAuthAdapter extends CallbackCheckAdapter
{
    private ?Result $result;

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

    public function authenticateUser(): ?User
    {
        $this->result = $this->authenticate();

        if (!$this->result || !$this->result->isValid()) {
            return null;
        }

        if (!$user = $this->getResultRowObject()) {
            return null;
        }

        $details = [
            'email'    => $user->email,
            'id'       => $user->id,
            'personId' => $user->person_id,
            'username' => $user->username,
        ];

        return new User($this->getIdentity(), [], $details);
    }

    public function getResult(): ?Result
    {
        return $this->result;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }
}

