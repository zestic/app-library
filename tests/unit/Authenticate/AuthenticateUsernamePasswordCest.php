<?php
declare(strict_types=1);

namespace Tests\Unit\Authenticate;

use App\Authenticate\AuthenticateUsernamePassword;
use App\Jwt\Interactor\CreateJwtToken;
use AspectMock\Test as Mock;
use Laminas\Authentication\Adapter\Callback;
use Ramsey\Uuid\Uuid;
use UnitTester;

class AuthenticateUsernamePasswordCest
{
    public function testAuthenticateValid(UnitTester $I)
    {
        $authentication = $this->getAuthenticateUsernamePassword();
        $jwt = $authentication->authenticate('test', 'p@ssw0rd');
        $I->assertEquals($this->expectedJwt(), $jwt);
    }

    private function expectedJwt(): string
    {
        return <<<JWT
eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c
JWT;
    }

    private function getAuthenticateUsernamePassword()
    {
        $createJwtTokenMock = Mock::double(CreateJwtToken::class, ['handle' => $this->expectedJwt()]);
        $createJwtToken = $createJwtTokenMock->make();
        $authAdapter = new Callback(
            function () {
                return [
                    'email'    => 'test@test.com',
                    'id'       => (Uuid::uuid4())->toString(),
                    'password' => 'salt',
                    'personId' => (Uuid::uuid4())->toString(),
                    'username' => 'test',
                ];
            }
        );

        return new AuthenticateUsernamePassword($authAdapter, $createJwtToken);
    }
}
