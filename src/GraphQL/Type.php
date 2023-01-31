<?php
declare(strict_types=1);

namespace App\GraphQL;

use App\GraphQL\Input\PaginateInput;
use App\GraphQL\Object\PaginationObject;
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
