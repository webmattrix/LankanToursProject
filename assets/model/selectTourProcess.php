<?php

require "./sqlConnection.php";

$selectSec = $_GET["indSel"];

$filtering;

if ($selectSec == "select") {
   $filtering = Database::search("SELECT * FROM `tour`");
}
if ($selectSec == "tour_name") {
   $filtering = Database::search("SELECT * FROM `tour` ORDER BY `name` ASC");
} else if ($selectSec == "date") {
   $filtering = Database::search("SELECT * FROM `tour` ORDER BY `date_count` ASC");
} else if ($selectSec == "active") {
   $filtering = Database::search("SELECT * FROM `tour` INNER JOIN `tour_status` ON `tour`.`tour_status_id`=`tour_status`.`id` ORDER BY `tour_status_id` ASC");
}

$toursRs = $filtering->fetch_all(MYSQLI_ASSOC);

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

      foreach ($toursRs as $tours) {

         $count_ord_rs = Database::search("SELECT *, COUNT(`saving_amount`) AS `buy_count`,`saving_amount` FROM `order` INNER JOIN `tour` ON `order`.`tour_id`=`tour`.`id` WHERE `tour_id`='" . $tours["id"] . "'");
         $count_ord_num = $count_ord_rs->num_rows;

         $count_ord_data = $count_ord_rs->fetch_assoc();

         // $views;

         // if ($count_ord_data["views"] > 0) {
         //    $views = $count_ord_data["views"];
         // } else if ($count_ord_data["views"] == 0) {
         //    $views  = 0;
         // }

         $purchased_count;

         if ($count_ord_data["saving_amount"] > 0) {

            $purchased_count = $count_ord_data["buy_count"];
         } else if ($count_ord_data["saving_amount"] == 0) {
            $purchased_count = 0;
         }

         // $start_date = $count_ord_data["start_date"];
         // $end_date = $count_ord_data["end_date"];

         // $duration = date_diff(new DateTime($start_date), new DateTime($end_date))->d;

      ?>

         <tr>
            <div class="row">
               <th class="col-3 py-2 text-center fw-normal mt-tab-textC"><?php echo $tours["name"]; ?></th>
               <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $tours['views']; ?></td>
               <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $purchased_count; ?></td>
               <td class="col-2 py-2 text-center mt-tab-textC"><?php echo $tours['date_count']; ?></td>
               <td class="col-1 py-2 text-center">
                  <iconify-icon icon="bi:eye-fill" onclick="tourUpdate(<?php echo $tours['id']; ?>);" class="p-1 rounded-2" style="background: radial-gradient(50% 50% at 50% 50%, #AFAFAF 0%, #949494 100%); color: #fff; cursor: pointer;"></iconify-icon>
               </td>
            </div>
         </tr>

      <?php

      }

      ?>

   </tbody>
</table>