<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use App\GraphQL\Type\Output\Query\IsEmailAddressAvailableOutput;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

final class IsEmailAddressAvailableQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'email' => Type::nonNull(Type::string()),
            ],
            'name' => 'isEmailAddressAvailable',
            'type' => new IsEmailAddressAvailableOutput(),
        ];
        parent::__construct($config);
    }
}
