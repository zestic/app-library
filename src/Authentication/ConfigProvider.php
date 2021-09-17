<?php
declare(strict_types=1);

namespace App\Authentication;

use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\User\FindUserByIdInterface;

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
                    'findUser'               => FindUserByIdInterface::class,
                ],
                'column' => [
                    'credential' => 'password',
                    'identity'   => 'username',
                ],
                'tableName'   => 'auth_lookups',
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
