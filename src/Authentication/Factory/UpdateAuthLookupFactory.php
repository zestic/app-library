<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\UpdateAuthLookup;
use Psr\Container\ContainerInterface;

final class UpdateAuthLookupFactory
{
    public function __construct(
        private $configName = 'auth_lookups',
    ) { }

    public function __invoke(ContainerInterface $container): UpdateAuthLookup
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new UpdateAuthLookup($authAdapter);
    }
}
