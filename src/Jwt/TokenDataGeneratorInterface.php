<?php
declare(strict_types=1);

namespace App\Jwt;

use Common\Entity\UserInterface;

interface TokenDataGeneratorInterface
{
    public function generate(UserInterface $person): TokenData;
}
