<?php

require "sqlConnection.php";
session_start();
if (isset($_GET["user"])) {
    if ($_GET["user"] == "guide") {
        Test::loadGuideSession();
    } else if ($_GET["user"] == "admin") {
        Test::loadAdminSession();
    } else if ($_GET["user"] == "tourist") {
        Test::loadTouristSession();
    } else {
        echo ("Access Denied!");
    }
}
class Test
{
    public static function loadGuideSession()
    {

        $rs = Database::search("SELECT *,`employee`.`id` AS `employee_id`
        FROM `employee`
        INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
        INNER JOIN `guide` ON `guide`.`employee_id`=`employee`.`id`
        WHERE `employe_type`.`name`='guide' AND `employee`.`email`='vihangaheshan@gmail.com' AND `employee`.`password`='asd321asd'");

        $_SESSION["lt_guide"] = $rs->fetch_assoc();
    }
    public static function loadAdminSession()
    {

        $rs = Database::search("SELECT * 
        FROM `employee`
        INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
        INNER JOIN `admin` ON `admin`.`employee_id`=`employee`.`id`
        WHERE (`employe_type`.`name`='owner' OR `employe_type`.`name`='super admin' OR `employe_type`.`name`='admin') AND `email`='admin01@gmail.com' AND `password`='admin1280'");

        $_SESSION["lt_admin"] = $rs->fetch_assoc();
    }
    public static function loadTouristSession()
    {

        $rs = Database::search("SELECT * FROM `user` WHERE `email`='vihangaheshan@gmail.com' AND `password`='ASD321ASD'");

        $_SESSION["lt_tourist"] = $rs->fetch_assoc();
    }
}
?>

<a href="?user=guide"><button>Guide</button></a>
<a href="?user=admin"><button>Admin</button></a>
<a href="?user=tourist"><button>Tourist</button></a>
<a href="http://localhost/lankanTours/LankanToursProject/assets/model/setTimeZoneSession?timeZone=Asia/Colombo"><button>Time Zone</button></a>
