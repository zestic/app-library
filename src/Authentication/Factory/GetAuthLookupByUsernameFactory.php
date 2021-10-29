<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\GetAuthLookupByUsername;
use Psr\Container\ContainerInterface;

final class GetAuthLookupByUsernameFactory
{
    public function __construct(
        private $configName = 'users',
    ) { }

    public function __invoke(ContainerInterface $container): GetAuthLookupByUsername
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new GetAuthLookupByUsername($authAdapter);
    }
}
