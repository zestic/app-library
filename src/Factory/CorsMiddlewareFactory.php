<?php
declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Tuupola\Middleware\CorsMiddleware;

class CorsMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): CorsMiddleware
    {
        $config =
    }
}