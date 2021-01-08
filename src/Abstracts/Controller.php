<?php
namespace DiscordBot\Abstracts;

use DiscordBot\Entities\ParsedMessage;

abstract class Controller
{
    public static function execute(ParsedMessage $msg) {}
}
