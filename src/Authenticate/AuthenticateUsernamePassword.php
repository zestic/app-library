<?php
declare(strict_types=1);

namespace App\Authenticate;

use App\Entity\Interfaces\UserInterface;
use App\Entity\User;
use App\Interactor\AuthenticationResponseInterface;
use App\Interactor\FindPersonByIdInterface;
use App\Jwt\Interactor\CreateJwtToken;
use Laminas\Authentication\Adapter\ValidatableAdapterInterface;

final class AuthenticateUsernamePassword
{
    /** @var \Laminas\Authentication\Adapter\ValidatableAdapterInterface */
    private $authAdapter;
    /** @var \App\Interactor\AuthenticationResponseInterface */
    private $authenticationResponse;
    /** @var \App\Jwt\Interactor\CreateJwtToken */
    private $createJwtToken;
    /** @var \App\Interactor\FindPersonByIdInterface */
    private $findPersonById;

    public function __construct(
        ValidatableAdapterInterface $authAdapter,
        CreateJwtToken $createJwtToken,
        FindPersonByIdInterface $findPersonById,
        AuthenticationResponseInterface $authenticationResponse
    ) {
        $this->authAdapter = $authAdapter;
        $this->authenticationResponse = $authenticationResponse;
        $this->createJwtToken = $createJwtToken;
        $this->findPersonById = $findPersonById;
    }

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
        $jwt = $this->createJwtToken->handle($user);
        $person = $this->findPersonById->find($user->getPersonId());

        return $this->authenticationResponse->response($person, $jwt);
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
