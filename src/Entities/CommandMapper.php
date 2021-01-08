<?php
namespace DiscordBot\Entities;

class CommandMapper
{
    protected static $map;

    public static function map(array $data)
    {
        foreach ($data as $command => $class) {
            self::$map[$command] = $class;
        }
    }

    public static function getClass(string $cmd)
    {
        if (!array_key_exists($cmd, self::$map)) {
            return null;
        }

        return self::$map[$cmd];
    }
}
