<?php
namespace DiscordBot\Entities;

use Dotenv\Dotenv;
use Discord\Discord;
use DiscordBot\MessageHandler;
use DiscordBot\Parsers\MessageParser;

class Application
{
    protected static $discord;

    public static function run(string $baseDir)
    {
        self::bootstrap($baseDir);

        self::$discord->run();
    }

    private static function bootstrap(string $baseDir)
    {
        Container::set('baseDir', $baseDir);

        $dotenv = Dotenv::createImmutable($baseDir);
        $dotenv->load();

        self::$discord = new Discord([
            'token' => $_ENV['DISCORD_TOKEN'],
        ]);

        Container::set('discord', self::$discord);

        self::$discord->on('ready', function ($discord) {
            echo "Bot is Online!", PHP_EOL;
        
            $discord->on('message', function ($message, $discord) {
                Container::set('original_message', $message);
                $message = MessageParser::parse($message);
                Container::set('parsed_message', $message);

                MessageHandler::handle($message, $discord);
            });
        });
    }
}
