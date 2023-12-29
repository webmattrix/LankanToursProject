<?php


require "assets/model/getTourViews.php";

$x = TourViews::getViews('project');
echo ($x);
