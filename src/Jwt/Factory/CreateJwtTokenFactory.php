<?php
declare(strict_types=1);

namespace App\Jwt\Factory;

use App\Jwt\Interactor\CreateJwtToken;
use App\Jwt\JwtConfiguration;
use Psr\Container\ContainerInterface;
use Zapi\Domain\Jwt\TokenDataGenerator;

class CreateJwtTokenFactory
{
    public function __invoke(ContainerInterface $container): CreateJwtToken
    {
        $configuration = $container->get(JwtConfiguration::class);
        $generator = $container->get(TokenDataGenerator::class);

        return new CreateJwtToken($configuration, $generator);
    }
}
