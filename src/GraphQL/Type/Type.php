<?php
declare(strict_types=1);

namespace App\GraphQL\Type;

use App\GraphQL\Type\Input\PaginateInput;
use App\GraphQL\Type\Object\PaginationObject;
use GraphQL\Type\Definition\Type as BaseType;

abstract class Type extends BaseType
{
    private static $paginateInput;
    private static $paginationObject;

    public static function paginationInput()
    {
        return self::$paginateInput ?: (self::$paginateInput = new PaginateInput());
    }

    public static function paginationObject()
    {
        return self::$paginationObject ?: (self::$paginationObject = new PaginationObject());
    }
}
