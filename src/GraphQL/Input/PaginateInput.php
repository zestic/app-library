<?php
declare(strict_types=1);

namespace App\GraphQL\Input;

use App\GraphQL\Type\GraphQLType;
use GraphQL\Type\Definition\InputObjectType;

final class PaginateInput extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'name'   => 'Paginate',
            'fields' => [
                'startIndex' => ['type' => GraphQLType::int()],
                'stopIndex'  => ['type' => GraphQLType::int()],
            ],
        ];
        parent::__construct($config);
    }
}
