<?php
declare(strict_types=1);

namespace Tests\Unit\Factory;

use App\Factory\OperationMappingFactory;
use App\Service\OperationMapping;
use App\Service\OperationMappingConfig;
use AspectMock\Test as Mock;
use Closure;
use Tests\Fixture\TestContainer;
use UnitTester;

class OperationMappingFactoryCest
{
    public function testInvoke(UnitTester $I)
    {
        $getReturn = function($id) {
            switch ($id) {
                case OperationMappingConfig::class:
                    return Mock::double(OperationMappingConfig::class, [])->make();
            }
        };
        $containerMock = Mock::double(TestContainer::class, ['get' => $getReturn]);
        $container = $containerMock->make();
        $middleware = (new OperationMappingFactory())->__invoke($container);

        $getProperty = function($middleware, $property) {
            $closure = function($property) {
                return $this->$property;
            };

            return Closure::bind($closure, $middleware, OperationMapping::class)->__invoke($property);
        };

        $I->assertInstanceOf(OperationMappingConfig::class, $getProperty($middleware, 'mappingConfig'));
    }
}
