<?php
declare(strict_types=1);

namespace Tests\Unit\Jwt\Factory;

use ArrayObject;
use Common\Jwt\Factory\JwtConfigurationFactory;
use Tests\Fixture\TestContainer;
use UnitTester;

class JwtConfigurationFactoryCest
{
    public function testInvoke(UnitTester $I)
    {
        $container = (new TestContainer());
        $jwtConfig = [
            'jwt' => [
                'algorithm' => 'RS256',
                'privateKeyPath' => __DIR__ . '/../../../_support/Fixture/jwt/private.pem',
                'publicKeyPath' => __DIR__ . '/../../../_support/Fixture/jwt/public.pem',
                'tokenTtl' => 3600,
            ],
        ];
        $config = new ArrayObject($jwtConfig);
        $container->set('config', $config);

        $config = (new JwtConfigurationFactory())->__invoke($container);

        $I->assertSame('RS256', $config->getAlgorithm());
        $I->assertSame(3600, $config->getTokenTtl());
        $I->assertSame($this->getExpectedPrivateKey(), $config->getPrivateKey());
        $I->assertSame($this->getExpectedPublicKey(), $config->getPublicKey());
    }

    private function getExpectedPrivateKey(): string
    {
        return <<<PRIVATE_KEY
-----BEGIN RSA PRIVATE KEY-----
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
-----END RSA PRIVATE KEY-----

PRIVATE_KEY;
    }

    private function getExpectedPublicKey(): string
    {
        return <<<PUBLIC_KEY
-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEApJ1O3NsW3oWAYgMouZyE
yP8faYCm/P2l/hb1YaPEWiPCS6wI3E2gcDbSS/pQuBOZA8GX5xBYNG6G3s7KHwUi
2Z1IlvaH0Ac+pZIVZDhgyerIn7JZVlzcGgq0NFvljr0P9kDZkNW2LLhLYVISQAcv
Y04u1LlgjqPbWRzg5DXUwSdPwccnLGwsNLYJEhtmAUz+ggNpZGiiQkA8dO90Us+e
OWWAKQPItkAsxTfiIBi5D3L3L4EG4UbsKcn7LJCvnQ+O9vCUmZlOWiPAJ3cN7eX3
CqfZVZqaw+pq5UYAObBgJjRKi5z0xVS+JRCvpYPLz05ehK1ctklE1+32GGG8WdL2
QfP9N1eJHqJmVzymA+jqdmoKzmEVeHkn1BPms6XkUTLyzipxcdNbVcXYHDDHfKar
EgxATlitxSAk/UE+YqrN3WhIA7PCVi3SwohpSSJ8o1A+/zTe0eZ/gx4g1hf5LgTd
PQDsK2G5piwGy1Xy+lKUZIBMnTKw9CrwVnG7KimkwvPBCxnxblFq3Gx8R9/CDitV
ZkbOKxP7Q+18b+z7z/+EC4W7nPQa1wYR5dSPzyvPVAM23sNDInNoEVlHGa6jsnxe
VQUlL1F88OnApUKeJ+rOck2P7+X8v/keHzueR1GtGCnjukNjQW1AvmSQBQCWReei
+SVgCN1jO75vpPjVUs22ZbMCAwEAAQ==
-----END PUBLIC KEY-----

PUBLIC_KEY;
    }
}
