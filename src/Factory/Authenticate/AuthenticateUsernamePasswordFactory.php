<?php
declare(strict_types=1);

namespace App\Factory\Authenticate;

use App\Authenticate\AuthenticateUsernamePassword;
use App\Jwt\Interactor\CreateJwtToken;
use ConfigValue\GatherConfigValues;
use Laminas\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Laminas\Db\Adapter\Adapter;
use Psr\Container\ContainerInterface;

final class AuthenticateUsernamePasswordFactory
{
    public function __construct(
        private $configName = 'users',
    ) { }

    public function __invoke(ContainerInterface $container): AuthenticateUsernamePassword
    {
        $authConfig = (new GatherConfigValues)($container, 'graphqlauth');
        $config = $authConfig[$this->configName];
        if (empty($config['callback'])) {
            $config['callback'] = function ($hash, $password) {
                return password_verify($password, $hash);
            };
        }
        $adapter = new Adapter(
            [
                'database' => $config['schema'],
                'driver'   => 'pdo_mysql',
                'hostname' => $config['host'],
                'password' => $config['password'],
                'port'     => $config['port'],
                'username' => $config['user'],
            ]
        );
        $authAdapter = new CallbackCheckAdapter(
            $adapter,
            $config['name'],
            $config['column']['identity'],
            $config['column']['credential'],
            $config['callback']
        );

        $class = $config['class'];
        $authenticationResponse = $container->get($class['authenticationResponse']);
        $createJwtToken = $container->get(CreateJwtToken::class);
        $findPersonById = $container->get($class['findPerson']);

        return new AuthenticateUsernamePassword(
            $authAdapter,
            $createJwtToken,
            $findPersonById,
            $authenticationResponse
        );
    }
}
