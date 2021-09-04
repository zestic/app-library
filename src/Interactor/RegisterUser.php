<?php
declare(strict_types=1);

namespace App\Interactor;

use App\Authenticate\UpdateUser;
use App\Interfaces\NewUserInterface;
use Zestic\Contracts\Person\CreatePersonInterface;

final class RegisterUser
{
    /** @var \App\Interactor\CreateUser */
    private $createUser;
    /** @var \Zestic\Contracts\Person\CreatePersonInterface */
    private $createPerson;
    /** @var \App\Authenticate\UpdateUser */
    private $updateUser;

    public function __construct(
        CreateUser $createUser,
        CreatePersonInterface $createPerson,
        UpdateUser $updateUser
    ) {
        $this->createUser = $createUser;
        $this->createPerson = $createPerson;
        $this->updateUser = $updateUser;
    }

    public function register(NewUserInterface $newUser): array
    {
        $userId = $this->createUser->create($newUser);
        $person = $this->createPerson->create($newUser);
        $data = [
            'person_id' => $person->getId(),
        ];
        $this->updateUser->update($userId, $data);

        return [
            'person' => $person,
        ];
    }
}
