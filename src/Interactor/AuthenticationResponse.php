<?php
declare(strict_types=1);

namespace App\Interactor;

use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\Person\PersonInterface;

final class AuthenticationResponse implements AuthenticationResponseInterface
{
    public function response(PersonInterface $person, string $jwt, int $expiresAt): array
    {
        return [
            'expiresAt' => $expiresAt,
            'jwt'       => $jwt,
            'person'    => $person,
            'success'   => true,
        ];
    }
}
