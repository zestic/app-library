<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Output;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;
use App\GraphQL\Type\Type;

final class IsUsernameAvailableOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name' => 'IsUsernameAvailableOutput',
            'fields' => [
                'isAvailable' => ['type' => Type::boolean()],
            ]
        ];
        parent::__construct($config);
    }
}
