<?php

require "sqlConnection.php";
if (isset($_GET["city_id"])) {
    if ($_GET["city_id"] == 0) {
        $query = "SELECT * FROM `place` ORDER BY `name` ASC";
    } else {
        $query = "SELECT * FROM `place` WHERE `city_id`='" . $_GET["city_id"] . "' ORDER BY `name` ASC";
    }
    $ct_place_rs = Database::search($query);
    $ct_place_num = $ct_place_rs->num_rows;
?>
    <select id="addTourPlace" class="w-100 p-2 rounded">
        <option value="0" class="">Place Name</option>
        <?php
        for ($ct_place_iteration = 0; $ct_place_iteration < $ct_place_num; $ct_place_iteration++) {
            $ct_place_data = $ct_place_rs->fetch_assoc();
        ?>
            <option value="<?php echo ($ct_place_data["id"]); ?>" class=""><?php echo ($ct_place_data["name"]); ?></option>
        <?php
        }
        ?>
    </select>

<?php
}
