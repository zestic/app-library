<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation\Operation;

use App\GraphQL\Type\GraphQLType;
use App\GraphQL\Type\Output\ResetPasswordOutput;
use GraphQL\Type\Definition\FieldDefinition;

final class ResetPasswordMutation extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'password'       => GraphQLType::nonNull(GraphQLType::string()),
                'verifyPassword' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'name' => 'resetPassword',
            'type' => new ResetPasswordOutput(),
        ];
        parent::__construct($config);
    }
}
