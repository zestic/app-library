<?php
declare(strict_types=1);

namespace App\Authentication;

use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\User\UserInterface;

final class AuthenticationResponse implements AuthenticationResponseInterface
{
    public function response(UserInterface $user, string $jwt, int $expiresAt): array
    {
        return [
            'expiresAt' => $expiresAt,
            'jwt'       => $jwt,
            'user'      => $user,
            'success'   => true,
        ];
    }
}
