<?php

class Visiter
{
    public static function getFile()
    {
        $file = './assets/data/visitors.json';
        return ($file);
    }

    public static function setVisiter()
    {
        $data = file_get_contents(Visiter::getFile());
        $setObj = json_decode($data);
        $setObj->visiter_count = $setObj->visiter_count + 1;
        file_put_contents(Visiter::getFile(), json_encode($setObj));
    }

    public static function getVisiter()
    {
        $data = file_get_contents(Visiter::getFile());
        $getObj = json_decode($data);
        return ($getObj->visiter_count);
    }
}
