<?php
declare(strict_types=1);

namespace App\Authentication\Factory;

use App\Authentication\Interactor\GetAuthLookupByUserId;
use Psr\Container\ContainerInterface;

final class GetAuthLookupByUserIdFactory
{
    public function __construct(
        private $configName = 'auth_lookups',
    ) { }

    public function __invoke(ContainerInterface $container): GetAuthLookupByUserId
    {
        $authAdapter = $container->get($this->configName . '.authAdapter');

        return new GetAuthLookupByUserId($authAdapter);
    }
}
