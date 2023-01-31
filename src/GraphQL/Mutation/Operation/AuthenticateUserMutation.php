<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation\Operation;

use App\GraphQL\Mutation\Output\AuthenticateUserOutput;
use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\FieldDefinition;

final class AuthenticateUserMutation extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'username' => GraphQLType::nonNull(GraphQLType::string()),
                'password' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'name' => 'authenticateUser',
            'type' => new AuthenticateUserOutput(),
        ];
        parent::__construct($config);
    }
}
