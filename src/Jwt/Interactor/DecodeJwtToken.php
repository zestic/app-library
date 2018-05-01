<?php
declare(strict_types=1);

namespace Common\Jwt\Interactor;

use App\Jwt\JwtConfiguration;
use Common\Interactor\StdClassToArray;
use Firebase\JWT\JWT;

class DecodeJwtToken
{
    private $config;

    public function __construct(JwtConfiguration $config)
    {
        $this->config = $config;
    }

    public function decode(string $jwt): array
    {
        $decoded = JWT::decode($jwt, $this->config->getPublicKey(), [$this->config->getAlgorithm()]);

        return (new StdClassToArray)($decoded);
    }
}
