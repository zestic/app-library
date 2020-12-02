<?php
declare(strict_types=1);

namespace App\GraphQL\Type;

use App\GraphQL\Type\Output\Query\IsEmailAddressAvailableOutput;
use App\GraphQL\Type\Output\Query\IsUsernameAvailableOutput;
use GraphQL\Type\Definition\Type as BaseType;

final class AuthenticationType extends BaseType
{
    private static $isEmailAddressAvailable;
    private static $isUsernameAvailable;

    public static function isEmailAddressAvailableOutput()
    {
        return self::$isEmailAddressAvailable ?: (self::$isEmailAddressAvailable = new IsEmailAddressAvailableOutput());
    }

    public static function isUsernameAvailableOutput()
    {
        return self::$isUsernameAvailable ?: (self::$isUsernameAvailable = new IsUsernameAvailableOutput());
    }
}
