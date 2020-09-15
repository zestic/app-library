<?php
declare(strict_types=1);

namespace App\Interactor;

use Ramsey\Uuid\UuidInterface;

final class UpdateUser
{
    /** @var \PDO */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function update(UuidInterface $id, array $data): bool
    {
        $setData = $this->prepData($data);
        $sql = <<<SQL
UPDATE users
SET $setData
WHERE id = '{$id->toString()}';
SQL;

        return (bool) $this->pdo->exec($sql);
    }

    private function prepData(array $data): string
    {
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        unset($data['id']);

        $setData = [];
        foreach ($data as $column => $value) {
            $setData[] = "$column = '$value'";
        }

        return implode(',', $setData);
    }
}
