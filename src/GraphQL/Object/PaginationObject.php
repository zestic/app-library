<?php
declare(strict_types=1);

namespace App\GraphQL\Object;

use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\ObjectType;

final class PaginationObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name'   => 'Pagination',
            'fields' => [
                'startIndex' => ['type' => GraphQLType::int()],
                'stopIndex'  => ['type' => GraphQLType::int()],
                'total'      => ['type' => GraphQLType::int()],
            ],
        ];
        parent::__construct($config);
    }
}
