<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\FieldDefinition;
use App\GraphQL\Type\Type;

final class IsEmailAddressAvailableQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'email' => Type::nonNull(Type::string()),
            ],
            'name'    => 'isEmailAddressAvailable',
            'type' => Type::IsEmailAddressAvailableOutput(),
        ];
        parent::__construct($config);
    }
}
