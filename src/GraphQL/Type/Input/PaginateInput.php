<?php
declare(strict_types=1);

namespace App\GraphQL\Type\Input;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type as BaseType;

final class PaginateInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'name'   => 'Paginate',
            'fields' => [
                'search'     => ['type' => BaseType::string()],
                'startIndex' => ['type' => BaseType::int()],
                'stopIndex'  => ['type' => BaseType::int()],
            ],
        ];
        parent::__construct($config);
    }
}
