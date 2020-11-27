<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Type\Output\AuthenticateUserOutput;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

final class AuthenticateUserMutation extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'username' => Type::nonNull(Type::string()),
                'password' => Type::nonNull(Type::string()),
            ],
            'name' => 'authenticateUser',
            'type' => new AuthenticateUserOutput(),
        ];
        parent::__construct($config);
    }
}
