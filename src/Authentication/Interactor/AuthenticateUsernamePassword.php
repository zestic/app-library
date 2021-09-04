<?php
declare(strict_types=1);

namespace App\Authentication\Interactor;

use App\Authentication\DbTableAuthAdapter;
use App\Jwt\Interactor\CreateJwtToken;
use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\Person\FindPersonByIdInterface;

final class AuthenticateUsernamePassword
{
    public function __construct(
        private DbTableAuthAdapter $authAdapter,
        private CreateJwtToken $createJwtToken,
        private FindPersonByIdInterface $findPersonById,
        private AuthenticationResponseInterface $authenticationResponse,
    ) { }

    public function authenticate(string $identity, string $credential): array
    {
        $this->authAdapter
            ->setIdentity($identity)
            ->setCredential($credential);

        if (!$user = $this->authAdapter->authenticateUser()) {
            return [
                'reasonCode' => $this->authAdapter->getResult()?->getCode(),
                'success'    => false,
            ];
        }

        [$jwt, $expiresAt] = $this->createJwtToken->handle($user);
        $person = $this->findPersonById->find($user->getPersonId());

        return $this->authenticationResponse->response($person, $jwt, $expiresAt);
    }
}
