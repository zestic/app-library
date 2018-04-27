<?php
declare(strict_types=1);

namespace Common\Jwt\Factory;

use Common\Jwt\Interactor\DecodeJwtToken;
use Common\Jwt\JwtConfiguration;
use Psr\Container\ContainerInterface;

class DecodeJwtTokenFactory
{
    public function __invoke(ContainerInterface $container): DecodeJwtToken
    {
        $configuration = $container->get(JwtConfiguration::class);

        return new DecodeJwtToken($configuration);
    }
}
