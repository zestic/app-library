<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\GetUserByPersonId;
use Psr\Container\ContainerInterface;

final class GetUserByPersonIdFactory
{
    public function __construct(
        private $configName = 'users',
    ) { }

    public function __invoke(ContainerInterface $container): GetUserByPersonId
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new GetUserByPersonId($authAdapter);
    }
}
