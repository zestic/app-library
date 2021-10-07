<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\CreateAuthLookup;
use Psr\Container\ContainerInterface;

final class CreateAuthLookupFactory
{
    public function __construct(
        private $configName = 'users',
    ) { }

    public function __invoke(ContainerInterface $container): CreateAuthLookup
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new CreateAuthLookup($authAdapter);
    }
}
