<?php
declare(strict_types=1);

namespace App\Jwt\Factory;

use App\Jwt\Interactor\CreateJwtToken;
use App\Jwt\JwtConfiguration;
use App\Jwt\TokenDataGeneratorInterface;
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
