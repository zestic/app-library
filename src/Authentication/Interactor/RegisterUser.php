<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\Interface\NewUserInterface;
use Zestic\Contracts\Person\CreatePersonInterface;

final class RegisterUser
{
    public function __construct(
        private CreateAuthLookup $createAuthLookup,
        private CreateUserInterface $createUser,
        private UpdateAuthLookup $updateAuthLookup,
    ) {
    }

    public function register(NewUserInterface $newUser): array
    {
        $lookupId = $this->createAuthLookup->create($newUser);
        $user = $this->createUser->create($newUser);
        $data = [
            'user_id' => $user->getId(),
        ];
        $this->updateAuthLookup->update($lookupId, $data);

        return [
            'user' => $user,
        ];
    }
}
