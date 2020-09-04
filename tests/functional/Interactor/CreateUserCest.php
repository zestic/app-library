<?php
declare(strict_types=1);

namespace Tests\Functional\Interactor;

use App\DTO\NewUser;
use App\Exception\UserException;
use App\Factory\PDOFactory;
use App\Interactor\CreateUser;
use FunctionalTester;
use Ramsey\Uuid\UuidInterface;

class CreateUserCest
{
    private $email = 'develop@zestic.com';
    private $password = 'password1';
    private $username = 'myusername';

    public function testCreate(FunctionalTester $I)
    {
        $id = $this->createTestUser();

        $I->assertInstanceOf(UuidInterface::class, $id);
        $I->seeInDatabase('users', ['username' => $this->username, 'email' => $this->email]);
        $hash = $I->grabFromDatabase('users', 'password', ['username' => $this->username]);
        $I->assertTrue(password_verify($this->password, $hash));
    }

    public function testExistingEmail(FunctionalTester $I)
    {
        $this->createTestUser();

        $I->expectThrowable(new UserException("Duplicate entry 'develop@zestic.com' for key 'users.email'"), function() {
            $newUser = (new NewUser())
                ->setEmail($this->email)
                ->setPassword($this->password)
                ->setUsername('differentusername');
            $this->getCreateUser()->create($newUser);
        });
    }

    public function testExistingUsername(FunctionalTester $I)
    {
        $this->createTestUser();

        $I->expectThrowable(new UserException("Duplicate entry 'myusername' for key 'users.username'"), function() {
            $newUser = (new NewUser())
                ->setEmail('email@zestic.com')
                ->setPassword($this->password)
                ->setUsername($this->username);
            $this->getCreateUser()->create($newUser);
        });
    }

    public function testRestrictedUsername(FunctionalTester $I)
    {
        $I->expectThrowable(new UserException("'localhost' is a restricted username"), function() {
            $newUser = (new NewUser())
                ->setEmail('email@zestic.com')
                ->setPassword($this->password)
                ->setUsername('localhost');
            $this->getCreateUser()->create($newUser);
        });
    }

    private function createTestUser(): UuidInterface
    {
        $newUser = (new NewUser())
            ->setEmail($this->email)
            ->setPassword($this->password)
            ->setUsername($this->username);

        return $this->getCreateUser()->create($newUser);
    }

    private function getCreateUser(): CreateUser
    {
        $pdo = (new PDOFactory())->createPDO();

        return new CreateUser($pdo);
    }
}
