<?php
declare(strict_types=1);

namespace App\Factory\Authenticate;

use App\Authenticate\AuthenticateUsernamePassword;
use App\Jwt\Interactor\CreateJwtToken;
use ConfigValue\GatherConfigValues;
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

        $authAdapter = $container->get($this->configName . '.authAdapter');

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
