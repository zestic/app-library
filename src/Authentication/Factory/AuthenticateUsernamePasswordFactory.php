<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\AuthenticateUsernamePassword;
use App\Jwt\Interactor\CreateJwtToken;
use ConfigValue\GatherConfigValues;
use Psr\Container\ContainerInterface;

final class AuthenticateUsernamePasswordFactory
{
    public function __construct(
        private $configName = 'auth_lookups',
    ) { }

    public function __invoke(ContainerInterface $container): AuthenticateUsernamePassword
    {
        $authConfig = (new GatherConfigValues)($container, 'graphqlauth');
        $config = $authConfig[$this->configName];

        $authAdapter = $container->get($this->configName . '.authAdapter');

        $class = $config['class'];
        $authenticationResponse = $container->get($class['authenticationResponse']);
        $createJwtToken = $container->get(CreateJwtToken::class);
        $findUserById = $container->get($class['findUser']);

        return new AuthenticateUsernamePassword(
            $authAdapter,
            $createJwtToken,
            $findUserById,
            $authenticationResponse
        );
    }
}
