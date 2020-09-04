<?php
declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;

final class PDOFactory
{
    public function __invoke(ContainerInterface $container): \PDO
    {
        return $this->createPDO();
    }

    public function createPDO(): \PDO
    {
        $parts = explode('_', getenv('DATABASE_DRIVER'));
        $driver = array_pop($parts);

        $dsn = $driver . ':host=' . getenv('DATABASE_HOST') . ';dbname=' . getenv('DATABASE_NAME') . ';';

        return new \PDO($dsn, getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
    }
}
