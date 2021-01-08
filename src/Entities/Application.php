<?php
namespace DiscordBot\Entities;

use Dotenv\Dotenv;
use Discord\Discord;
use DiscordBot\MessageHandler;
use DiscordBot\Parsers\MessageParser;

class Application
{
    protected static $discord;

    public static function run()
    {
        self::bootstrap();

        self::$discord->run();
    }

    private static function bootstrap()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "../../../../../");
        $dotenv->load();

        self::$discord = new Discord([
            'token' => $_ENV['DISCORD_TOKEN'],
        ]);

        self::$discord->on('ready', function ($discord) {
            echo "Bot is Online!", PHP_EOL;
        
            $discord->on('message', function ($message, $discord) {
                $message = MessageParser::parse($message);
        
                MessageHandler::handle($message, $discord);
            });
        });
    }
}
