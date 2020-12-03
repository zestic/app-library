<?php
declare(strict_types=1);

namespace App\Interactor;

use App\Entity\Interfaces\PersonInterface;

final class AuthenticationResponse implements AuthenticationResponseInterface
{
    public function response(PersonInterface $person, string $jwt): array
    {
        return [
            'jwt'     => $jwt,
            'person'  => $person,
            'success' => true,
        ];
    }
}
