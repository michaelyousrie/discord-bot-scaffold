<?php
namespace DiscordBot\Traits;

trait HasDefaultStaticGetSetTrait
{
    protected static $values = [];

    public static function set(string $key, $value)
    {
        self::$values[$key] = $value;
    }

    public static function get(string $key)
    {
        if (!array_key_exists($key, self::$values)) {
            return null;
        }

        return self::$values[$key];
    }
}
