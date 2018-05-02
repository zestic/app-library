<?php
declare(strict_types=1);

namespace App\Factory;

use App\Service\OperationMappingConfig;
use Closure;
use Psr\Container\ContainerInterface;

class OperationMappingConfigFactory
{
    public function __invoke(ContainerInterface $container): OperationMappingConfig
    {
        $config = $container->get('config');
        $mapping = $config['operationMapping'];

        $mappingConfig = new OperationMappingConfig();
        $map = [];
        foreach ($mapping as $action => $service) {
            $map[$action] = $container->get($service);
        }

        $setMap = function($mappingConfig, $map) {
            $closure = function($map) {
                $this->map = $map;
            };
            Closure::bind($closure, $mappingConfig, OperationMappingConfig::class)->__invoke($map);
        };
        $setMap($mappingConfig, $map);

        return $mappingConfig;
    }
}
