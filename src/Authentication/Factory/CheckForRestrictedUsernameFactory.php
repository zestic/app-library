<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\CheckForRestrictedUsername;
use Psr\Container\ContainerInterface;

final class CheckForRestrictedUsernameFactory
{
    public function __construct(
        private $configName = 'users',
    ) { }

    public function __invoke(ContainerInterface $container): CheckForRestrictedUsername
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new CheckForRestrictedUsername($authAdapter);
    }
}
