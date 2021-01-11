<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Output\Query;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\OutputType;
use GraphQL\Type\Definition\Type;

final class IsEmailAddressAvailableOutput extends ObjectType implements OutputType
{
    public function __construct()
    {
        $config = [
            'name' => 'IsEmailAddressAvailableOutput',
            'fields' => [
                'isAvailable' => ['type' => Type::boolean()],
            ]
        ];
        parent::__construct($config);
    }
}
