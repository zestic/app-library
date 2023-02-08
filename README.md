# Zestic App Library

## Authentication

### GraphQL

In your `App` namespace, create the following directory structure
```
- GraphQL
    - Input
    - Mutation
        - Operation
        - Output
    - Object
    - Query
        - Operation
        - Output
```

Then add these files
`App\GraphQL\Mutation\MutationType`
```php
<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation;

use App\GraphQL\Mutation\Operation\UpdateSomethingMutation;
use GraphQL\Type\Definition\ObjectType;

final class MutationType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'name'   => 'Mutation',
                'fields' => [
                    'updateSomething' => new UpdateSomethingMutation(),
                ],
            ]
        );
    }
}
```

`App\GraphQL\Mutation\QueryType`
```php
<?php
declare(strict_types=1);

namespace App\GraphQL\Query;

use App\GraphQL\Query\Operation\PingQuery;
use GraphQL\Type\Definition\ObjectType;

final class QueryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct(
            [
                'name'   => 'Query',
                'fields' => [
                    'ping'                    => new PingQuery(),
                ],
            ],
        );
    }
}

```

`App\GraphQL\Type\GraphQLType`
```php
<?php
declare(strict_types=1);

namespace App\GraphQL\Type;

use App\GraphQL\Type;

final class GraphQLType extends Type
{

}
```
Add
```php 
    public static function userInfo()
    {
        return self::$userInfo ?: (self::$userInfo = new UserInfoObject());
    }
```

## Pagination

### GraphQL

There is a `Paginate` input (paginate is a verb) and a `Pagination` output (pagination is a noun).

The inputs and outputs are set up to work with the [React Virtualized Infinite Loader](https://bvaughn.github.io/react-virtualized/#/components/InfiniteLoader)
