<?php
declare(strict_types=1);

namespace Tests\Unit\Service;

use App\Service\OperationMapping;
use App\Service\OperationMappingConfig;
use AspectMock\Test as Mock;
use Common\Communique\Communique;
use Common\Communique\Reply;
use Tests\Fixture\TestHandlerService;
use UnitTester;

class OperationMappingCest
{
    public function testHandle(UnitTester $I)
    {
        $testService = new TestHandlerService();
        $configMock = Mock::double(OperationMappingConfig::class, ['getService' => $testService]);
        $config = $configMock->make();

        $OperationMapping = new OperationMapping($config);
        $reply = $OperationMapping->handle(new Communique());

        $I->assertInstanceOf(Reply::class, $reply);
    }
}
