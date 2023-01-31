<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation\Operation;

use App\GraphQL\Type\GraphQLType;
use App\GraphQL\Type\Output\ForgotPasswordOutput;
use GraphQL\Type\Definition\FieldDefinition;

final class ForgotPasswordMutation extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'email' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'name' => 'forgotPassword',
            'type' => new ForgotPasswordOutput(),
        ];
        parent::__construct($config);
    }
}
