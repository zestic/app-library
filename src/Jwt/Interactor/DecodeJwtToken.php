<?php
declare(strict_types=1);

namespace App\Jwt\Interactor;

use App\Jwt\JwtConfiguration;
use Firebase\JWT\JWT;
use Zestic\Contracts\Jwt\DecodeJwtTokenInterface;

class DecodeJwtToken implements DecodeJwtTokenInterface
{
    public function __construct(
        private JwtConfiguration $config,
    ) { }

    public function decode(string $jwt): array
    {
        $decoded = JWT::decode($jwt, $this->config->getPublicKey(), [$this->config->getAlgorithm()]);

        return (new StdClassToArray)($decoded);
    }
}
