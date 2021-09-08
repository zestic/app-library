<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Object;

use App\GraphQL\Type\Type;
use GraphQL\Type\Definition\ObjectType;

final class PaginationObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name'   => 'Pagination',
            'fields' => [
                'startIndex' => ['type' => BaseType::int()],
                'stopIndex'  => ['type' => BaseType::int()],
                'total'      => ['type' => BaseType::int()],
            ],
        ];
        parent::__construct($config);
    }
}
