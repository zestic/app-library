<?php
declare(strict_types=1);

namespace App\Factory\Authenticate;

use App\Authenticate\AuthenticateUsernamePassword;
use App\Interactor\FindPersonByIdInterface;
use App\Jwt\Interactor\CreateJwtToken;
use ConfigValue\GatherConfigValues;
use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Laminas\Db\Adapter\Adapter;
use Psr\Container\ContainerInterface;

final class AuthenticateUsernamePasswordFactory
{
    public function __construct(
        private $configName = 'usersdb',
    ) { }

    public function __invoke(ContainerInterface $container): AuthenticateUsernamePassword
    {
        $values = (new GatherConfigValues)($container, $this->configName);
        if (empty($values['callback'])) {
            $values['callback'] = function ($hash, $password) {
                return password_verify($password, $hash);
            };
        }
        $adapter = new Adapter(
            [
                'database' => $values['schema'],
                'driver'   => 'pdo_mysql',
                'hostname' => $values['host'],
                'password' => $values['password'],
                'port'     => $values['port'],
                'username' => $values['user'],
            ]
        );
        $authAdapter = new CallbackCheckAdapter(
            $adapter,
            $values['name'],
            $values['column']['identity'],
            $values['column']['credential'],
            $values['callback']
        );
        $createJwtToken = $container->get(CreateJwtToken::class);
        $findPersonById = $container->get(FindPersonByIdInterface::class);

        return new AuthenticateUsernamePassword(
            $authAdapter,
            $createJwtToken,
            $findPersonById
        );
    }
}
