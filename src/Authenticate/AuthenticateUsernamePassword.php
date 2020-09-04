<?php
declare(strict_types=1);

namespace App\Authenticate;

use App\Entity\Interfaces\UserInterface;
use App\Entity\User;
use App\Jwt\Interactor\CreateJwtToken;
use Firebase\JWT\JWT;
use Laminas\Authentication\Adapter\ValidatableAdapterInterface;

final class AuthenticateUsernamePassword
{
    /** @var \Laminas\Authentication\Adapter\ValidatableAdapterInterface */
    private $authAdapter;
    /** @var \App\Jwt\Interactor\CreateJwtToken */
    private $createJwtToken;

    public function __construct(
        ValidatableAdapterInterface $authAdapter,
        CreateJwtToken $createJwtToken
    ) {
        $this->authAdapter = $authAdapter;
        $this->createJwtToken = $createJwtToken;
    }

    public function authenticate(string $identity, string $credential): ?string
    {
        $this->authAdapter
            ->setIdentity($identity)
            ->setCredential($credential);
        $result = $this->authAdapter->authenticate();

        if (!$result->isValid()) {
            return null;
        }

        $user = $this->getUser();

        return $this->createJwtToken->handle($user);
    }

    private function getUser(): UserInterface
    {
        $user = $this->authAdapter->getResultRowObject();
        $details = [
            'email' => $user->email,
            'id' => $user->id,
            'personId' => $user->person_id,
            'username' => $user->username,
        ];

        return new User($this->authAdapter->getIdentity(), [], $details);
    }
}