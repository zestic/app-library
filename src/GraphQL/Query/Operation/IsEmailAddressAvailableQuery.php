<?php
declare(strict_types=1);

namespace App\GraphQL\Query\Operation;

use App\GraphQL\Query\Output\IsEmailAddressAvailableOutput;
use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\FieldDefinition;

final class IsEmailAddressAvailableQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'email' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'name' => 'isEmailAddressAvailable',
            'type' => new IsEmailAddressAvailableOutput(),
        ];
        parent::__construct($config);
    }
}
