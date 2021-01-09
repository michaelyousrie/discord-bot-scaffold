<?php
namespace DiscordBot\Abstracts;

use DiscordBot\Entities\EmojiMapper;
use DiscordBot\Entities\ParsedMessage;

abstract class Controller
{
    public static function execute(ParsedMessage $msg) {}

    public function emoji(string $key)
    {
        return EmojiMapper::get($key);
    }
}
