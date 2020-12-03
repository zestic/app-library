<?php
declare(strict_types=1);

namespace App\Interactor;

use App\Entity\Interfaces\PersonInterface;

interface AuthenticationResponseInterface
{
    public function response(PersonInterface $person, string $jwt): array;
}
