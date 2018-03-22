<?php
declare(strict_types=1);

namespace Tests\Unit\Factory;

use ArrayObject;
use AspectMock\Test as Mock;
use App\Factory\CorsMiddlewareFactory;
use Closure;
use Tests\Fixture\TestContainer;
use Tuupola\Middleware\CorsMiddleware;
use UnitTester;

class CorsMiddlewareFactoryCest
{
    public function testInvoke(UnitTester $I)
    {
        $config = [
            'origin' => ['*'],
            'methods' => ['POST'],
            "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since"],
            "headers.expose" => ["Etag"],
            "credentials" => true,
            "cache" => 86400,
        ];
        $getReturn = function ($id) use ($config) {
            switch ($id) {
                case 'config':
                    return new ArrayObject(
                        [
                            'middleware' => [
                                'cors' => $config,
                            ],
                        ]
                    );
            }
        };
        $containerMock = Mock::double(TestContainer::class, ['get' => $getReturn]);
        $container = $containerMock->make();
        $corsMiddleware = (new CorsMiddlewareFactory())->__invoke($container);

        $getOptions = function ($middleware) {
            $closure = function () {
                return $this->options;
            };

            return Closure::bind($closure, $middleware, CorsMiddleware::class)->__invoke();
        };

        $expected = [
            'origin' => ['*'],
            'methods' => ['POST'],
            "headers.allow" => ["Authorization", "If-Match", "If-Unmodified-Since"],
            "headers.expose" => ["Etag"],
            "credentials" => true,
            "cache" => 86400,
            "error" => null,
        ];

        $I->assertSame($expected, $getOptions($corsMiddleware));
    }
}