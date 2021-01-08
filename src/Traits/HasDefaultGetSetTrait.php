<?php
namespace DiscordBot\Traits;

trait HasDefaultGetSetTrait
{
    protected $values = [];

    public function __set(string $key, $value)
    {
        $this->values[$key] = $value;
    }

    public function __get(string $key)
    {
        if (!array_key_exists($key, $this->values)) {
            return null;
        }

        return $this->values[$key];
    }
}
