
<?php

require "./sqlConnection.php";

if (isset($_GET["ctLi"])) {

    $city_vlue = $_GET["ctLi"];

    $city_check_rs = Database::search("SELECT * FROM `place` WHERE `city_id`='".$city_vlue."' ORDER BY `name` ASC");
    $city_check_num = $city_check_rs->num_rows;

    for($z =0; $z < $city_check_num;$z++){
      $city_check_data = $city_check_rs->fetch_assoc();

      ?>
      
       <option value="<?php echo $city_check_data["id"];?>"><?php echo $city_check_data["name"];?></option>

      <?php

    }
}else{
    echo("Something went wrong");
}
?>