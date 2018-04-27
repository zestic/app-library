<?php
declare(strict_types=1);

namespace Tests\Unit\Jwt\Interactor;

use AspectMock\Test as Mock;
use Carbon\Carbon;
use Common\Interactor\StdClassToArray;
use Common\Jwt\Interactor\CreateJwtToken;
use DateTime;
use Firebase\JWT\JWT;
use Tests\Fixture\TestGenerator;
use Tests\Fixture\TestUser;
use UnitTester;

class CreateJwtTokenCest extends AbstractTokenTest
{
    public function testHandle(UnitTester $I)
    {
        $now = Carbon::now();
        Mock::double(Carbon::class, ['now' => $now]);

        $generator = new TestGenerator();
        $config = $this->getJwtConfiguration();

        $createToken = new CreateJwtToken($config, $generator);

        $user = new TestUser();
        $token = $createToken->handle($user);

        $decoded = JWT::decode($token, $config->getPublicKey(), ['RS256']);
        $decoded = (new StdClassToArray)($decoded);

        $expected = [
            'personId' => '8675309',
            'someOtherData' => [
                'key' => 'ofLife',
            ],
            'exp' => $now->addSecond($config->getTokenTtl())->getTimestamp(),
        ];
        $I->assertSame($expected, $decoded);
    }
}
