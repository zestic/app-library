<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Output;

use App\GraphQL\Type\Object\PersonObject;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;
use GraphQL\Type\Definition\Type;

final class AuthenticateUserOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name'   => 'AuthenticateUserOutput',
            'fields' => [
                'expiresAt' => ['type' => Type::int()],
                'jwt'       => ['type' => Type::string()],
                'person'    => ['type' => new PersonObject()],
            ],
        ];
        parent::__construct($config);
    }
}
