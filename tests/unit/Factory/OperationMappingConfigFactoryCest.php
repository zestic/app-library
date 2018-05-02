<?php
declare(strict_types=1);

namespace Tests\Unit\Factory;

use App\Factory\OperationMappingConfigFactory;
use ArrayObject;
use AspectMock\Test as Mock;
use Closure;
use Common\Communique\Communique;
use Tests\Fixture\TestContainer;
use Tests\Fixture\TestHandlerService;
use UnitTester;

class OperationMappingConfigFactoryCest
{
    public function testInvoke(UnitTester $I)
    {
        $getReturn = function ($id) {
            $config = new ArrayObject([
                'operationMapping' => [
                    'testHandler' => TestHandlerService::class,
                ],
            ]);
            switch ($id) {
                case 'config':
                    return $config;
                case TestHandlerService::class:
                    return new TestHandlerService();
            }
        };
        $containerMock = Mock::double(TestContainer::class, ['get' => $getReturn]);
        $container = $containerMock->make();
        $mappingConfig = (new OperationMappingConfigFactory())->__invoke($container);
        $communique = new Communique();
        $setAction = function ($communique, $action) {
            $closure = function($action) {
                $this->operation = $action;
            };
            Closure::bind($closure, $communique, Communique::class)->__invoke($action);
        };
        $setAction($communique, 'testHandler');

        $I->assertInstanceOf(TestHandlerService::class, $mappingConfig->getService($communique));
    }
}
