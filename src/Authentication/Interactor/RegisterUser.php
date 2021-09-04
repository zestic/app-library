<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\Interface\NewUserInterface;
use Zestic\Contracts\Person\CreatePersonInterface;

final class RegisterUser
{
    public function __construct(
        private CreateUser $createUser,
        private CreatePersonInterface $createPerson,
        private UpdateUser $updateUser,
    ) {
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
