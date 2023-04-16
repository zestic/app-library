<?php
declare(strict_types=1);

namespace App\GraphQL\Query\Operation;

use App\GraphQL\Type\GraphQLType;
use App\GraphQL\Type\Output\Query\GetAppStateOutput;
use GraphQL\Type\Definition\FieldDefinition;

final class GetAppStateQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'userId' => GraphQLType::nonNull(GraphQLType::string()),
            ],
            'name' => 'getAppState',
            'type' => new GetAppStateOutput(),
        ];
        parent::__construct($config);
    }
}
