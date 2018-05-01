<?php
declare(strict_types=1);

namespace App\Jwt\Factory;

use App\Jwt\Interactor\DecodeJwtToken;
use App\Jwt\JwtConfiguration;
use Psr\Container\ContainerInterface;

class DecodeJwtTokenFactory
{
    public function __invoke(ContainerInterface $container): DecodeJwtToken
    {
        $configuration = $container->get(JwtConfiguration::class);

        return new DecodeJwtToken($configuration);
    }
}
