<?php
namespace DiscordBot\Entities;

class DiscordUser
{
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function __get(string $key)
    {
        return $this->user->$key;
    }

    public function dm(string $msg)
    {
        return $this->user->sendMessage($msg);
    }
}
