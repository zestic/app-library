<?php
declare(strict_types=1);

namespace App\Factory;

use App\Service\OperationMapping;
use App\Service\OperationMappingConfig;
use Psr\Container\ContainerInterface;

class OperationMappingFactory
{
    public function __invoke(ContainerInterface $container): OperationMapping
    {
        $mappingConfig = $container->get(OperationMappingConfig::class);

        return new OperationMapping($mappingConfig);
    }
}
