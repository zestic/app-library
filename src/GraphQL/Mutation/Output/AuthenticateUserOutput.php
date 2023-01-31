<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation\Output;

use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;

final class AuthenticateUserOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name'   => 'AuthenticateUserOutput',
            'fields' => [
                'expiresAt' => ['type' => GraphQLType::int()],
                'jwt'       => ['type' => GraphQLType::string()],
                'user'      => ['type' => GraphQLType::user()],
            ],
        ];
        parent::__construct($config);
    }
}
