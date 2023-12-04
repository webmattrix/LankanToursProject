<?php

<<<<<<< HEAD
if (isset($_GET["id"])) {
    // echo ($_GET["id"]);
} else {
    echo ("Something went wrong");
}
=======

require "assets/model/getTourViews.php";

$x = TourViews::getViews('project');
echo ($x);
>>>>>>> d1170cce44b1450a01381adfd333613266ceab9b
