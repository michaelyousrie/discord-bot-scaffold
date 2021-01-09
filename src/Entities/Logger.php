<?php
namespace DiscordBot\Entities;

use Carbon\Carbon;

class Logger
{
    public static function log($data)
    {
        $carbon = Carbon::now();
        $date = $carbon->format('Y-m-d');
        $time = $carbon->format('H:i:s A');

        $dir = Container::get('baseDir') . "/Logs/{$date}.log";

        if (file_exists($dir)) {
            $f = fopen($dir, 'a');
        } else {
            $f = fopen($dir, 'w');
        }

        if (is_array($data) || is_object($data)) {
            $data = json_decode($data, true);
        }

        $data = "[{$date} - {$time}] \n\n {$data}";

        fwrite($f, $data);
        fclose($f);
    }
}
