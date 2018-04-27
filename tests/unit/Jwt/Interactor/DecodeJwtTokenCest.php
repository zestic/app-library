<?php
declare(strict_types=1);

namespace Tests\Unit\Jwt\Interactor;

use Common\Jwt\Interactor\DecodeJwtToken;
use UnitTester;

class DecodeJwtTokenCest extends AbstractTokenTest
{
    public function testInvoke(UnitTester $I)
    {
        $config = $this->getJwtConfiguration();
        $decodeToken = new DecodeJwtToken($config);
        $decoded = $decodeToken->decode($this->token());

        $I->assertSame($this->expectedDecoded(), $decoded);
    }

    protected function token(): string
    {
        return <<<TOKEN
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJwZXJzb25JZCI6Ijg2NzUzMDkiLCJzb21lT3RoZXJEYXRhIjp7ImtleSI6Im9mTGlmZSJ9fQ.cwryiFjIB4EM-_Q_hvGZCytKVXqIGOwIzhiH0KxXTQO1KjQVFMZ6nGb4EV38w3Lgvi08cSNSrp24lnZRWJAoCX5GCv7pP7LLNCg4IJjM6OB9Ij1vme-V2K-tFwjNaGYffKCRk9HMoA1KbxuHt_QkDgUA-ohALqiGmcNOq7JoeCLLKk1KQzCGaVygisylHaCXL-U2DIEja2AcrVw5hdxrspSsA6ZPZwxyuBGe4Mel4QkHEEcagBmi4yL-Low0jtBCr7zVvqQtA_kfvT8mGXHRuPd_NHxYmUx4euwy8KtYHZsmxpxA_QbuUnnrr38l3TWpGOWC1bCEv601KZ2J8ch5MmTnYIwnj-g707a-vGU_54hBu2mSe5Br2FHiOQJVQuZqcfTahjvFsbuzRG0YjzN9BIEfbu_zGC_WUvQ9cwPbl0MbRV6GA-HIULW-rqI2hPliE-_LwbgJ56XfA9M83z5e7JZm7KpK8McOZJ1tse4xrphgqmBBMpFgyL9rXPKwKT7v5GrCTdIEFltkEEgYXYyZBzd445e8cXiFHtD4x8vqBp9nxovpUCgo1fZVJZY1q_bTcI05kscyBgi5nra2Pqg2bve84Hhe2WNygCIOpsgYqSD2jVhMexh3PXMXGWR9E9UHofL76dUrMf1zwB8Oec1B_StaVucwEWpbpMBukThwuPI
TOKEN;
    }

    private function expectedDecoded(): array
    {
        return [
            'personId' => '8675309',
            'someOtherData' => [
                'key' => 'ofLife',
            ]
        ];
    }
}
