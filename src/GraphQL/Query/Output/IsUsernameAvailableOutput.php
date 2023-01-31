<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Output\Query;

use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;

final class IsUsernameAvailableOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name' => 'IsUsernameAvailableOutput',
            'fields' => [
                'isAvailable' => ['type' => GraphQLType::boolean()],
            ]
        ];
        parent::__construct($config);
    }
}
