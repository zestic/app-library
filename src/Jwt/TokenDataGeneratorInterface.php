<?php
declare(strict_types=1);

namespace App\Jwt;

use Zestic\Contracts\User\UserInterface;

interface TokenDataGeneratorInterface
{
    public function generate(UserInterface $person): TokenData;
}
