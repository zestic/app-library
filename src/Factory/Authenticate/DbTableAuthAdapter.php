<?php
declare(strict_types=1);

namespace App\Factory\Authenticate;

use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Laminas\Db\Adapter\Adapter;
use Psr\Container\ContainerInterface;
use Xaddax\Interactor\GatherConfigValues;

final class DbTableAuthAdapter
{
    public function __construct(
        private $configName = 'usersdb',
    ) { }

    public function __invoke(ContainerInterface $container): CallbackCheckAdapter
    {
        $values = (new GatherConfigValues)($container, $this->configName);
        if (empty($values['credentialValidationCallback'])) {
            $values['credentialValidationCallback'] = function ($hash, $password) {
                return password_verify($password, $hash);
            };
        }
        $adapter = new Adapter(
            [
                'database' => $values['schema'],
                'driver'   => 'Pdo_Mysql',
                'hostname' => $values['host'],
                'password' => $values['password'],
                'port'     => $values['port'],
                'username' => $values['user'],
            ]
        );

        return new CallbackCheckAdapter(
            $adapter,
            $values['tableName'],
            $values['identityColumn'],
            $values['credentialColumn'],
            $values['credentialValidationCallback']
        );
    }
}
