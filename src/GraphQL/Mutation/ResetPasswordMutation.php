<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Type\Output\ResetPasswordOutput;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

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
