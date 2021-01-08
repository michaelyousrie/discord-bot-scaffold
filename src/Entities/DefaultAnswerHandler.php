<?php
namespace App\Entities;

class DefaultAnswerHandler
{
    public static function getUnknownCommandMessage()
    {
        return $_ENV['DISCORD_BOT_UNKNOWN_MESSAGE'] ?: "I have no memory of this command!";
    }
}
