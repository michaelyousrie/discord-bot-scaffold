<?php
namespace DiscordBot\Parsers;

use DiscordBot\Entities\DiscordChannel;
use DiscordBot\Entities\DiscordUser;
use DiscordBot\Entities\ParsedMessage;

class MessageParser
{
    public static function parse($message): ParsedMessage
    {
        $parsedMessage = new ParsedMessage;

        $parsedMessage->original = $message;
        $parsedMessage->msg = $message->content;

        if (strpos(
            strtolower($message->content), 
            strtolower($_ENV['DISCORD_BOT_PREFIX'])
        ) === 0) {
            $parsedMessage->isCommand = true;
            $exploded = explode($_ENV['DISCORD_BOT_PREFIX'], $message->content);

            $parsedMessage->commandPrefix = $exploded[0];
            $parsedMessage->command = $exploded[1];

            $explodedCommand = explode(" ", $exploded[1]);
            $commandArgs = [];

            foreach($explodedCommand as $arg) {
                $commandArgs[] = $arg;
            }

            $parsedMessage->commandArgs = $commandArgs;
        }

        $parsedMessage->author = new DiscordUser($message['author']);
        $parsedMessage->channel = new DiscordChannel($message['channel']);

        return $parsedMessage;
    }
}
