<?php
declare(strict_types=1);

namespace App\Authenticate;

use App\Interactor\AuthenticationResponse;
use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\Person\FindPersonByIdInterface;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'graphqlauth'  => $this->getDefaultAuthSettings(),
        ];
    }

    private function getDefaultAuthSettings(): array
    {
        return [
            'users' => [
                'class'  => [
                    'authenticationResponse' => AuthenticationResponseInterface::class,
                    'findPerson'             => FindPersonByIdInterface::class,
                ],
                'column' => [
                    'credential' => 'password',
                    'identity'   => 'username',
                ],
                'name'   => 'users',
            ],
        ];
    }

    private function getDependencies(): array
    {
        return [
            'aliases' => [
                AuthenticationResponseInterface::class => AuthenticationResponse::class,
            ],
        ];
    }
}
