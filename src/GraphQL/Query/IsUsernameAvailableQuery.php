<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\FieldDefinition;
use App\GraphQL\Type\AuthenticationType as Type;

final class IsUsernameAvailableQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'username' => Type::nonNull(Type::string()),
            ],
            'name'    => 'isUsernameAvailable',
            'type' => Type::isUsernameAvailableOutput(),
        ];
        parent::__construct($config);
    }
}
