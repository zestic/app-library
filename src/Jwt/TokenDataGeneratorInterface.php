<?php
declare(strict_types=1);

namespace App\Jwt;

use App\Entity\Interfaces\UserInterface;

interface TokenDataGeneratorInterface
{
    public function generate(UserInterface $person): TokenData;
}
