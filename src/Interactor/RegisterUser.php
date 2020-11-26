<?php
declare(strict_types=1);

namespace App\Interactor;

use App\Interfaces\NewUserInterface;
use Ramsey\Uuid\Uuid;

final class RegisterUser
{
    /** @var \App\Interactor\CreateUser */
    private $createUser;
    /** @var \App\Interactor\CreatePersonInterface */
    private $createPerson;
    /** @var \App\Interactor\UpdateUser */
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
