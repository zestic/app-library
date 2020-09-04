<?php
declare(strict_types=1);

namespace Tests\Functional\Interactor;

use App\Factory\PDOFactory;
use App\Interactor\DoesUserExist;
use FunctionalTester;
use Ramsey\Uuid\Uuid;

class DoesUserExistCest
{
    private $email = 'develop@zestic.com';
    private $pdo;
    private $username = 'myusername';

    public function testIsEmailAvailable(FunctionalTester $I)
    {
        $results = $this->doesUserExist()->isEmailAvailable($this->email);
        $I->assertTrue($results);
    }

    public function testIsEmailUnavailable(FunctionalTester $I)
    {
        $this->insertUser();

        $results = $this->doesUserExist()->isEmailAvailable($this->email);
        $I->assertFalse($results);
    }

    public function testIsUsernameAvailable(FunctionalTester $I)
    {
        $results = $this->doesUserExist()->isUsernameAvailable($this->username);
        $I->assertTrue($results);
    }

    public function testIsUsernameUnavailable(FunctionalTester $I)
    {
        $this->insertUser();

        $results = $this->doesUserExist()->isUsernameAvailable($this->username);
        $I->assertFalse($results);
    }

    public function testIsRestrictedUsernameUnavailable(FunctionalTester $I)
    {
        $results = $this->doesUserExist()->isUsernameAvailable('localhost');
        $I->assertFalse($results);
    }

    private function doesUserExist(): DoesUserExist
    {
        return new DoesUserExist($this->getPDO());
    }

    private function getPDO(): \PDO
    {
        if (!$this->pdo) {
            $this->pdo = (new PDOFactory())->createPDO();
        }

        return $this->pdo;
    }

    private function insertUser()
    {
        $sql = <<<SQL
INSERT INTO users
    (email, id, password, username)
     VALUES ('$this->email', '9050b766-4c08-48f9-a38e-19b0455a4c64', 'password1', '$this->username');
SQL;
        $this->getPDO()->exec($sql);
    }
}
