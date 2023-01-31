#Zestic App Library

## Authentication

### GraphQL

In your project `App\GraphQL\Type\GraphQLType`
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
