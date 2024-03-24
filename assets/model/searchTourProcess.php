<?php

require "./sqlConnection.php";

$inputval = $_GET["srch"];

$searchRs;

if ($inputval == "") {
    $searchRs = Database::search("SELECT * FROM `tour`");
} else {
    $searchRs = Database::search("SELECT * FROM `tour` WHERE `name` 
                              LIKE '%" . $inputval . "%' OR `id` 
                              LIKE '%" . $inputval . "%' OR `description` 
                              LIKE '%" . $inputval . "%' OR `date_count`
                              LIKE '%" . $inputval . "%'");
}
$search_num = $searchRs->num_rows;

?>

<table class="table-bordered" style=" font-family: 'Inter'; border: 1px solid #858585;">
    <thead>
        <tr>
            <div class="row">
                <th class="col-3 py-3 text-center mt-tab-textC">Tour Name</th>
                <th class="col-2 py-3 text-center mt-tab-textC">Views</th>
                <th class="col-2 py-3 text-center mt-tab-textC">Purchased Count</th>
                <th class="col-2 py-3 text-center mt-tab-textC">Duration of tour</th>
                <th class="col-1 py-3 text-center mt-tab-textC">Action</th>
            </div>
        </tr>
    </thead>
    <tbody>

        <?php

        for ($c = 0; $c < $search_num; $c++) {

            $search_data = $searchRs->fetch_assoc();

            // $tour_plan_data = $tour_plan_rs->fetch_assoc();

            $count_ord_rs = Database::search("SELECT *, COUNT(`saving_amount`) AS `buy_count`,`saving_amount` FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` WHERE `tour_id`='" . $search_data["id"] . "'");
            $count_ord_num = $count_ord_rs->num_rows;

            $count_ord_data = $count_ord_rs->fetch_assoc();

            // $views;

            // if ($count_ord_data["views"] > 0) {
            //     $views = $count_ord_data["views"];
            // } else if ($count_ord_data["views"] == 0) {
            //     $views  = 0;
            // }

            if ($count_ord_data["saving_amount"] > 0) {

                $purchased_count = $count_ord_data["buy_count"];
            } else if ($count_ord_data["saving_amount"] == 0) {
                $purchased_count = 0;
            }

            // // $start_date = $count_ord_data["start_date"];
            // // $end_date = $count_ord_data["end_date"];

            // // $duration = date_diff(new DateTime($start_date), new DateTime($end_date))->d;
            // $duration = $tour_plan_data['date_count'];

        ?>

            <tr>
                <div class="row">
                    <th class="col-3 py-2 text-center fw-normal mt-tab-textC"><?php echo $search_data["name"]; ?></th>
                    <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $search_data['views']; ?></td>
                    <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $purchased_count; ?></td>
                    <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $search_data['date_count']; ?></td>
                    <td class="col-1 py-2 text-center">
                        <iconify-icon icon="bi:eye-fill" onclick="tourUpdate(<?php echo $search_data['id']; ?>);" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
                    </td>
                </div>
            </tr>

        <?php

        }

        ?>

    </tbody>
</table>