<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\FieldDefinition;
use App\GraphQL\Type\OutputType;
use App\GraphQL\Type\Type;

final class GetAppStateQuery extends FieldDefinition
{
    public function __construct()
    {
        $config = [
            'args' => [
                'personId' => Type::nonNull(Type::string()),
            ],
            'name' => 'getAppState',
            'type' => OutputType::getAppState(),
        ];
        parent::__construct($config);
    }
}
