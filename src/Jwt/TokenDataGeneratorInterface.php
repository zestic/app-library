<?php
declare(strict_types=1);

namespace Common\Jwt;

use Common\Entity\UserInterface;

interface TokenDataGeneratorInterface
{
    public function generate(UserInterface $person): TokenData;
}
