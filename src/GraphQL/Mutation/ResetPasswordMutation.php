<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Type\Output\ResetPasswordOutput;
use App\GraphQL\Type\Type;
use GraphQL\Type\Definition\FieldDefinition;

final class ResetPasswordMutation extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'password'       => Type::nonNull(Type::string()),
                'verifyPassword' => Type::nonNull(Type::string()),
            ],
            'name' => 'resetPassword',
            'type' => new ResetPasswordOutput(),
        ];
        parent::__construct($config);
    }
}
