<?php
namespace DiscordBot\Entities;

use Exception;

class EmojiMapper
{
    protected static $emojis;

    public static function map(array $data)
    {
        foreach($data as $id => $discordId) {
            self::$emojis[$id] = $discordId;
        }
    }

    public static function get(string $key)
    {
        if (!array_key_exists($key, self::$emojis)) {
            throw new Exception("Unknown Emoji!");
        }

        return self::$emojis[$key];
    }
}
