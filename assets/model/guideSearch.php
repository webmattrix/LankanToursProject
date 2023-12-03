<?php
require "sqlConnection.php";
$text = $_GET["text"];

?>

<div class="col-12 table-responsive">
    <table class="table  align-middle table-hover   mb-3" style="background-color:#E8E8E8; border-radius: 5px; font-family:Inter;">
        <thead>
            <tr>
                <th scope="col">Guid Name</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Rating</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
  
            $query =  "SELECT * FROM `employee` INNER JOIN `guide` ON employee.id = guide.employee_id WHERE `employee`.`name` LIKE '%" . $text . "%' ";

            $pageno;

            if (isset($_GET["page_no"])) {
                $page_no = $_GET["page_no"];
            } else {
                $page_no = 1;
            }

            $guideTable_rs = Database::search($query);
            $n = $guideTable_rs->num_rows;
          
            $result_per_page = 5;
            $number_of_pages = ceil($n / $result_per_page);
            $offset = ($page_no - 1) * $result_per_page;
            $guideTable_rs = Database::search($query . " LIMIT " . $result_per_page . " OFFSET " . $offset . "");
            $guideTable_num = $guideTable_rs->num_rows;

for ($x = 0; $x < $guideTable_num; $x++) {
$guideTable_data = $guideTable_rs->fetch_assoc();

?>
<tr style="font-size: small;">
    <td>
        <?php echo $guideTable_data["name"] ?>
    </td>
    <td>
        <?php echo $guideTable_data["address"] ?>
    </td>
    <td>
        <?php echo $guideTable_data["mobile"] ?>
    </td>
    <th>
        <?php echo $guideTable_data["rating"] ?>
    </th>

    <?php if ($guideTable_data["status"] == 0) {
        ?>
        <td><button class="btn btn-primary ">Available</button>

            <?php
    } else {
        ?>

        <td><button class="btn btn-danger">Unavailable</button>

            <?php
    }
    ?>
    </td>
</tr>
<?php
} ?>

</tbody>
</table>
<!-- Pagination -->
<div style="display: flex; justify-content: center;">
<div class="p_nation">

<?php

$middle_page;
$middle_left;
$middle_right;

if ($page_no <= 1) {
$middle_page = ceil($number_of_pages / 2);
} else if ($page_no >= $number_of_pages) {
$middle_page = ceil($number_of_pages / 2);
} else {
$middle_page = $page_no;
}

$middle_left = $middle_page - 1;
$middle_right = $middle_page + 1;


?>

<!--  -->
<a class="text-decoration-none p_nation_prev" href="?page_no=<?php
                            if ($page_no > 1) {
                                echo ($page_no - 1);
                            } else {
                                echo ("1");
                            }
                            ?>" <?php
                                if ($page_no == 1) {
                                ?> style="opacity: 0.5;" <?php
                                                        }
                                                            ?>>
<span class="d-none d-lg-block">Prev</span>
<i class="icon-arrow_circle_left_black_24dp d-block d-lg-none"></i>
</a>


<!-- First Page of the Pagination -->
<a href="?page_no=1" <?php
if ($page_no == "1") {
?> style="background-color: #0c0091; color: white;" <?php
                                    }
                                        ?>>1</a>
<!-- First Page of the Pagination -->


<!-- Inter ... of the Pagination -->
<?php
if (($middle_left != 2) && ($middle_left > 1)) {
?>
<a href="">...</a>
<?php
}
?>
<!-- Inter ... of the Pagination -->


<!-- Middle Left Button of the Pagination -->
<?php
if ($middle_left > 1) {
?>
<a href="?page_no=<?php echo ($middle_left); ?>" <?php
                    if ($page_no == $middle_left) {
                    ?> style="background-color: #0c0091; color: white;" <?php
                                                                    }
                                                                        ?>><?php echo ($middle_left); ?></a>
<?php
}
?>
<!-- Middle Left Button of the Pagination -->

<!-- Middle Button of the Pagination -->
<?php
if ($number_of_pages > 2) {
?>
<a href="?page_no=<?php echo ($middle_page); ?>" <?php
                    if ($page_no == $middle_page) {
                    ?> style="background-color: #0c0091; color: white;" <?php
                                                                    }
                                                                        ?>><?php echo ($middle_page); ?></a>
<?php
}
?>
<!-- Middle Button of the Pagination -->


<!-- Middle Right Button of the Pagination -->
<?php
if ($middle_right < $number_of_pages) {
?>
<a href="?page_no=<?php echo ($middle_right); ?>" <?php
                    if ($page_no == $middle_right) {
                    ?> style="background-color: #0c0091; color: white;" <?php
                                                                    }
                                                                        ?>><?php echo ($middle_right); ?></a>
<?php
}
?>
<!-- Middle Right Button of the Pagination -->


<!-- Inter ... of the pagination -->
<?php
if ($middle_right != ($number_of_pages - 1) && ($middle_right < ($number_of_pages - 1))) {
?>
<a href="">...</a>
<?php
}
?>
<!-- Inter ... of the pagination -->


<!-- Last page of the pagination -->
<?php
if ($number_of_pages > 1) {
?>
<a href="?page_no=<?php echo ($number_of_pages); ?>" <?php
                        if ($page_no == $number_of_pages) {
                        ?> style="background-color: #0c0091; color: white;" <?php
                                                                        }
                                                                            ?>><?php echo ($number_of_pages); ?></a>
<?php
}
?>
<!-- Last page of the pagination -->


<!-- Next Button of the pagination -->
<a class="text-decoration-none p_nation_next" href="?page_no=<?php
                            if ($page_no < $number_of_pages) {
                                echo ($page_no + 1);
                            } else if ($number_of_pages == 0) {
                                echo ("1");
                            } else {
                                echo ($number_of_pages);
                            }
                            ?>" <?php
                                if (($page_no == $number_of_pages) || ($number_of_pages == 0)) {
                                ?> style="opacity: 0.5;" <?php
                                                        }
                                                            ?>>
<span class="d-none d-lg-block">Next</span>
<i class="icon-arrow_circle_right_black_24dp1 d-block d-lg-none"></i>
</a>
<!-- Next Button of the pagination -->

</div>
</div>
<!-- Pagination -->
</div>