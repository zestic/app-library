<?php
declare(strict_types=1);

namespace App\GraphQL\Type;

use App\GraphQL\Type\Object\PaginationObject;
use GraphQL\Type\Definition\Type as BaseType;

abstract class Type extends BaseType
{
    private static $paginationInput;
    private static $paginationObject;

    public static function paginationObject()
    {
        return self::$paginationObject ?: (self::$paginationObject = new PaginationObject());
    }

    public static function paginationInput()
    {
        return self::$paginationInput ?: (self::$paginationInput = new PaginationObject());
    }
}
