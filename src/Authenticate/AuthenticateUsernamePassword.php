<?php
declare(strict_types=1);

namespace App\Authenticate;

use App\Entity\User;
use App\Jwt\Interactor\CreateJwtToken;
use Laminas\Authentication\Adapter\ValidatableAdapterInterface;
use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\Person\FindPersonByIdInterface;
use Zestic\Contracts\User\UserInterface;

final class AuthenticateUsernamePassword
{
    public function __construct(
        private ValidatableAdapterInterface $authAdapter,
        private CreateJwtToken $createJwtToken,
        private FindPersonByIdInterface $findPersonById,
        private AuthenticationResponseInterface $authenticationResponse,
    ) { }

    public function authenticate(string $identity, string $credential): array
    {
        $this->authAdapter
            ->setIdentity($identity)
            ->setCredential($credential);
        $result = $this->authAdapter->authenticate();

        if (!$result->isValid()) {
            return [
                'success' => false,
            ];
        }

        $user = $this->getUser();
        [$jwt, $expiresAt] = $this->createJwtToken->handle($user);
        $person = $this->findPersonById->find($user->getPersonId());

        return $this->authenticationResponse->response($person, $jwt, $expiresAt);
    }

    private function getUser(): UserInterface
    {
        $user = $this->authAdapter->getResultRowObject();
        $details = [
            'email'    => $user->email,
            'id'       => $user->id,
            'personId' => $user->person_id,
            'username' => $user->username,
        ];

        return new User($this->authAdapter->getIdentity(), [], $details);
    }
}
