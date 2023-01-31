<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation\Output;

use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;

final class ResetPasswordOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name' => 'ResetPasswordOutput',
            'fields' => [
                'message' => ['type' => GraphQLType::string()],
                'success' => ['type' => GraphQLType::boolean()],
            ]
        ];
        parent::__construct($config);
    }
}
