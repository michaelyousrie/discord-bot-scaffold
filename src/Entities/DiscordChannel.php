<?php
namespace DiscordBot\Entities;

use Discord\Parts\Channel\Channel;

class DiscordChannel
{
    protected $channel;

    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function __get(string $key)
    {
        return $this->channel->$key;
    }

    public function sendMessage(string $msg)
    {
        return $this->channel->sendMessage($msg);
    }

    public function clear()
    {
        // 
    }
}
