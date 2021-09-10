<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Object;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

final class PaginationObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name'   => 'Pagination',
            'fields' => [
                'startIndex' => ['type' => Type::int()],
                'stopIndex'  => ['type' => Type::int()],
                'total'      => ['type' => Type::int()],
            ],
        ];
        parent::__construct($config);
    }
}
