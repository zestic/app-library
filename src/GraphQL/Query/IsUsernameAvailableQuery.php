<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use App\GraphQL\Type\Output\Query\IsUsernameAvailableOutput;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

final class IsUsernameAvailableQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'username' => Type::nonNull(Type::string()),
            ],
            'name'    => 'isUsernameAvailable',
            'type' => new IsUsernameAvailableOutput(),
        ];
        parent::__construct($config);
    }
}
