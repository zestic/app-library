#Zestic App Library

## Authentication

### GraphQL

In your project `App\GraphQL\Type\ObjectType`

Add
```php 
    public static function userInfo()
    {
        return self::$userInfo ?: (self::$userInfo = new UserInfoObject());
    }
```
