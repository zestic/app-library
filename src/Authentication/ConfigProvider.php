<?php
declare(strict_types=1);

namespace App\Authentication;

use App\Authentication\Cli\ResetPasswordCommand;
use App\Authentication\Factory\AuthenticateUsernamePasswordFactory;
use App\Authentication\Factory\CheckForRestrictedUsernameFactory;
use App\Authentication\Factory\CreateAuthLookupFactory;
use App\Authentication\Factory\DbTableAuthAdapterFactory;
use App\Authentication\Factory\DoesUserExistFactory;
use App\Authentication\Factory\GetAuthLookupByUserIdFactory;
use App\Authentication\Factory\GetAuthLookupByUsernameFactory;
use App\Authentication\Factory\RegisterUserFactory;
use App\Authentication\Factory\UpdateAuthLookupFactory;
use App\Authentication\Factory\UpdatePasswordByUsernameFactory;
use App\Authentication\Interactor\RegisterUser;
use App\Domain\Factory\Command\AuthenticateUserHandlerFactory;
use App\Domain\Handler\Mutation\AuthenticateUserHandler;
use App\Jwt\Factory\CreateJwtTokenFactory;
use App\Jwt\Factory\DecodeJwtTokenFactory;
use App\Jwt\Factory\JwtConfigurationFactory;
use App\Jwt\Interactor\CreateJwtToken;
use App\Jwt\Interactor\DecodeJwtToken;
use App\Jwt\JwtConfiguration;
use Zestic\Contracts\Authentication\AuthenticationResponseInterface;
use Zestic\Contracts\User\CreateUserInterface;
use Zestic\Contracts\User\FindUserByIdInterface;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'graphqlauth'  => $this->getDefaultAuthSettings(),
            'laminas-cli'  => $this->getLaminasCli(),
        ];
    }

    private function getDefaultAuthSettings(): array
    {
        return [
            'users' => [
                'class'     => [
                    'authenticationResponse' => AuthenticationResponseInterface::class,
                    'findUser'               => FindUserByIdInterface::class,
                ],
                'column'    => [
                    'credential' => 'password',
                    'identity'   => 'username',
                ],
                'tableName' => 'auth_lookups',
            ],
        ];
    }

    private function getDependencies(): array
    {
        return [
            'aliases'   => [
                AuthenticationResponseInterface::class => AuthenticationResponse::class,
                RegisterUser::class                    => 'users.registerUser',
                'users.createUser'                     => CreateUserInterface::class,
            ],
            'factories' => [
                'users.authAdapter'                => new DbTableAuthAdapterFactory(),
                'users.authentication'             => new AuthenticateUsernamePasswordFactory(),
                'users.checkForRestrictedUsername' => new CheckForRestrictedUsernameFactory(),
                'users.createAuthLookup'           => new CreateAuthLookupFactory(),
                'users.doesUserExist'              => new DoesUserExistFactory(),
                'users.getAuthLookupByUserId'      => new GetAuthLookupByUserIdFactory(),
                'users.getAuthLookupByUsername'    => new GetAuthLookupByUsernameFactory(),
                'users.registerUser'               => new RegisterUserFactory(),
                'users.updateAuthLookup'           => new UpdateAuthLookupFactory(),
                'users.updatePasswordByUsername'   => new UpdatePasswordByUsernameFactory(),
                AuthenticateUserHandler::class     => AuthenticateUserHandlerFactory::class,
                CreateJwtToken::class              => CreateJwtTokenFactory::class,
                DecodeJwtToken::class              => DecodeJwtTokenFactory::class,
                JwtConfiguration::class            => JwtConfigurationFactory::class,
            ],
        ];
    }

    private function getLaminasCli(): array
    {
        return [
            'commands' => [
                'auth:reset-password'        => ResetPasswordCommand::class,
            ],
        ];
    }
}
