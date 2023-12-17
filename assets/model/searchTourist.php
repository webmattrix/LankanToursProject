<?php
require "sqlConnection.php";

$search = $_GET["search"];

$searchRs = Database::search("SELECT * FROM `user` WHERE `f_name`
 LIKE '%" . $search . "%' OR `l_name`
  LIKE '%" . $search . "%' OR `id`
   LIKE '%" . $search . "%' OR `email` 
    LIKE '%" . $search . "%'");

$n = $searchRs->num_rows;

?>
<table class="table table-striped rounded-3">
    <tr class="border border-secondary">
        <th>Tourist ID</th>
        <th>Tourist Name</th>
        <th>Email Address</th>
        <th>Registration Date</th>
        <th>Action</th>
    </tr>

    <?php
    for ($x = 0; $x < $n; $x++) {
        $user = $searchRs->fetch_assoc();
    ?>
        <tr class="border border-secondary">
            <td><?php
                echo $user['id'];
                ?></td>
            <td><?php
                echo $user['f_name'] . " " . $user['l_name'];
                ?></td>
            <td><?php
                echo $user['email'];
                ?></td>
            <td><?php
                $created_at = new DateTime($user['reg_date']);
                echo $formattedDate = $created_at->format('F j, Y');;
                ?></td>
            <td>
                <div class="col-4">
                    <button class="btn btn-secondary btn-sm py-1 px-2 border" onclick="viewDetails(<?php
                                                                                                    echo $user['id'];
                                                                                                    ?>)"><iconify-icon icon="ph:eye-fill"></iconify-icon></iconify-icon></button>
                </div>
            </td>

        </tr>
    <?php
    }
    ?>

</table>