<?php
declare(strict_types=1);

namespace App\GraphQL\Type;

use App\GraphQL\Type\Input\PaginateInput;
use App\GraphQL\Type\Object\PaginationObject;
use GraphQL\Type\Definition\Type as BaseType;

abstract class Type extends BaseType
{
    private static $paginate;
    private static $pagination;

    public static function paginate()
    {
        return self::$paginate ?: (self::$paginate = new PaginateInput());
    }

    public static function pagination()
    {
        return self::$pagination ?: (self::$pagination = new PaginationObject());
    }
}
