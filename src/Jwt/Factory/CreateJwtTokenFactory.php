<?php
declare(strict_types=1);

namespace Common\Jwt\Factory;

use Common\Jwt\Interactor\CreateJwtToken;
use Common\Jwt\JwtConfiguration;
use Common\Jwt\TokenDataGeneratorInterface;
use Psr\Container\ContainerInterface;

class CreateJwtTokenFactory
{
    public function __invoke(ContainerInterface $container): CreateJwtToken
    {
        $configuration = $container->get(JwtConfiguration::class);
        $generator = $container->get(TokenDataGeneratorInterface::class);

        return new CreateJwtToken($configuration, $generator);
    }
}
