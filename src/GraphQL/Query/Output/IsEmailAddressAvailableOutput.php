<?php
declare(strict_types=1);

namespace App\GraphQL\Query\Output;

use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;

final class IsEmailAddressAvailableOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name' => 'IsEmailAddressAvailableOutput',
            'fields' => [
                'isAvailable' => ['type' => GraphQLType::boolean()],
            ]
        ];
        parent::__construct($config);
    }
}
