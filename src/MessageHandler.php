<?php
namespace DiscordBot;

use App\Entities\DefaultAnswerHandler;
use DiscordBot\Entities\CommandMapper;
use DiscordBot\Entities\ParsedMessage;


class MessageHandler
{
    public static function handle(ParsedMessage $message, $discord)
    {
        if ($message->isCommand) {
            $class = CommandMapper::getClass($message->command);

            if (is_null($class)) {
                $message->channel->sendMessage(
                    DefaultAnswerHandler::getUnknownCommandMessage()
                );
            }

            return call_user_func_array("{$class}::execute", [$message]);
        }
    }
}
