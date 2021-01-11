<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Type\Output\ForgotPasswordOutput;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

final class ForgotPasswordMutation extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'email' => Type::nonNull(Type::string()),
            ],
            'name' => 'forgotPassword',
            'type' => new ForgotPasswordOutput(),
        ];
        parent::__construct($config);
    }
}
