<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\UpdateUser;
use Psr\Container\ContainerInterface;

final class UpdateUserFactory
{
    public function __construct(
        private $configName = 'users',
    ) { }

    public function __invoke(ContainerInterface $container): UpdateUser
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new UpdateUser($authAdapter);
    }
}
