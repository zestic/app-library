<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Output;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;
use GraphQL\Type\Definition\Type;
use App\GraphQL\Type\ObjectType as AppObjectType;

class AuthenticateUserOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name'   => 'AuthenticateUserOutput',
            'fields' => [
                'expiresAt' => ['type' => Type::int()],
                'jwt'       => ['type' => Type::string()],
                'userInfo'  => ['type' => AppObjectType::userInfo()],
            ],
        ];
        parent::__construct($config);
    }
}
