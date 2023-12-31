<?php

if (isset($_POST["action"])) {
    if ($_POST["action"] == 'getVisiter') {
        echo (Visiter::getVisiter($_POST['location']));
    } else if ($_POST["action"] == 'setVisiter') {
        Visiter::setVisiter($_POST['location']);
    }
}

class Visiter
{
    public static function getFile($location)
    {
        if ($location == 'project') {
            $file = './assets/data/visitors.json';
        } else if ($location == 'line1') {
            $file = '../assets/data/visitors.json';
        } else if ($location == 'line2') {
            $file = '../../assets/data/visitors.json';
        }
        return ($file);
    }

    public static function setVisiter($location)
    {

        $data = file_get_contents(Visiter::getFile($location));
        $setObj = json_decode($data);
        $setObj->visiter_count = $setObj->visiter_count + 1;
        file_put_contents(Visiter::getFile($location), json_encode($setObj));
    }

    public static function removeVisiter($location)
    {

        $data = file_get_contents(Visiter::getFile($location));
        $setObj = json_decode($data);
        $setObj->visiter_count = $setObj->visiter_count - 1;
        file_put_contents(Visiter::getFile($location), json_encode($setObj));
    }

    public static function getVisiter($location)
    {
        $data = file_get_contents(Visiter::getFile($location));
        $getObj = json_decode($data);
        return ($getObj->visiter_count);
    }
}
