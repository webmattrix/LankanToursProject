<?php

class TourViews
{
    public static function getFile($location)
    {
        if ($location == 'project') {
            $file = './assets/data/tourViews.json';
        } else if ($location == 'line1') {
            $file = '../assets/data/tourViews.json';
        } else if ($location == 'line2') {
            $file = '../../assets/data/tourViews.json';
        }
        return ($file);
    }

    public static function setViews($location)
    {

        $data = file_get_contents(TourViews::getFile($location));
        $setObj = json_decode($data);
        $setObj->viewCount = $setObj->viewCount + 1;
        file_put_contents(TourViews::getFile($location), json_encode($setObj));
    }

    public static function getViews($location)
    {
        $data = file_get_contents(TourViews::getFile($location));
        $getObj = json_decode($data);
        return ($getObj->viewCount);
    }
}