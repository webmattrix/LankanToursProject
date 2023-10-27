<?php

require "sqlConnection.php";
session_start();

$rs = Database::search("SELECT *,`employe_type`.`name` AS `employee_type`,`employee`.`name` AS `guide_name`,`employee`.`id` AS `guide_id`
FROM `employee`
INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
INNER JOIN `guide` ON `guide`.`employee_id`=`employee`.`id`
WHERE `employe_type`.`name`='guide' AND `employee`.`email`='vihangaheshan@gmail.com' AND `employee`.`password`='asd321asd'");

$_SESSION["lt_guide"] = $rs->fetch_assoc();
