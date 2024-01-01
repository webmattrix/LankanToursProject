<?php

require "./sqlConnection.php";


$tour_name = $_GET["tourName"];
$tour_id = $_GET["tourId"];

echo ($tour_id . " - " . $tour_name . " - ");

?>

<div class="col-12">
    <hr>

    <div class="row px-3">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="">
                <label for="" class="form-label">Tour Name</label>
                <input type="text" name="" id="" class="form-control" disabled>
            </div>
            <div class="mt-2">
                <label for="" class="form-label">Start Date</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="mt-2">
                <label for="" class="form-label">Guide Name</label>
                <?php
                $guide_table = Database::search("SELECT *,`employee`.`id` AS `emp_id`,`employee`.`name` AS `emp_name` FROM `employee`
                                                                    INNER JOIN `employe_type` ON `employe_type`.`id`=`employee`.`employe_type_id`
                                                                    WHERE `employe_type`.`name`='Guide' ORDER BY `employee`.`name` ASC");

                ?>
                <select name="" id="" class="form-control">
                    <option value="0">Select</option>
                    <?php
                    for ($guide_iteration = 0; $guide_iteration < $guide_table->num_rows; $guide_iteration++) {
                        $guide_table_data = $guide_table->fetch_assoc();
                    ?>
                        <option value="<?php echo ($guide_table_data["emp_id"]); ?>"><?php echo ($guide_table_data["emp_name"]); ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="mt-2 mt-md-0">
                <label for="" class="form-label">Tour Duration</label>
                <input type="text" name="" id="" class="form-control" disabled>
            </div>
            <div class="mt-2">
                <label for="" class="form-label">End Date</label>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="mt-2">
                <label for="" class="form-label">Tourist Name</label>
                <input type="text" name="" id="" class="form-control" disabled>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="mt-2 mt-md-0">
                <label for="" class="form-label">Cost</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text" name="" id="" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row px-2 mt-2">
                <label for="" class="form-label">Tourist Message</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control" disabled></textarea>
            </div>
            <div class="row px-2 mt-2">
                <label for="" class="form-label">Guide Message</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-12 col-lg-6 offset-0 offset-lg-3 bg-dark rounded py-4" style="background-image: url('../assets/img/Credit Card Transparent Vector.png'); background-size: contain; background-repeat: no-repeat; background-position: center; box-shadow: 3px 3px 10px 0px rgba(0,0,0,0.8);">
                    <div class="d-flex justify-content-between">
                        <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Payment Date</span>
                        <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">2023-12-12</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Paid Amount</span>
                        <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">$00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Payment Status</span>
                        <span class="text-white content-heading quicksand-SemiBold" style="text-shadow: 0px 0px 2px black;">Pending</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4 mb-3">
            <button class="btn btn-outline-success col-4 offset-4 shadow">Update</button>
        </div>
    </div>
</div>