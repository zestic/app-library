<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use App\GraphQL\Type\Output\Query\GetAppStateOutput;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

final class GetAppStateQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'personId' => Type::nonNull(Type::string()),
            ],
            'name' => 'getAppState',
            'type' => new GetAppStateOutput(),
        ];
        parent::__construct($config);
    }
}
