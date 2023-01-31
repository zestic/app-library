<?php
declare(strict_types=1);

namespace App\GraphQL\Query\Operation;

use App\GraphQL\Type\GraphQLType;
use App\GraphQL\Type\Output\Query\IsUsernameAvailableOutput;
use GraphQL\Type\Definition\FieldDefinition;

final class IsUsernameAvailableQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'username' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'name'    => 'isUsernameAvailable',
            'type' => new IsUsernameAvailableOutput(),
        ];
        parent::__construct($config);
    }
}
