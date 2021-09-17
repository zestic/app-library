<?php
declare(strict_types=1);

namespace App\Jwt;

use Zestic\Contracts\Authentication\AuthLookupInterface;

interface TokenDataGeneratorInterface
{
    public function generate(AuthLookupInterface $authLookup): TokenData;
}
