<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Output;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;
use GraphQL\Type\Definition\Type;

final class ForgotPasswordOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name' => 'ForgotPasswordOutput',
            'fields' => [
                'message' => ['type' => Type::string()],
                'success' => ['type' => Type::boolean()],
            ]
        ];
        parent::__construct($config);
    }
}
