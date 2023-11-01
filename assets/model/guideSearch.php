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

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $G_rs = Database::search($query);
            $n = $G_rs->num_rows;

            $results_per_page = 10;
            $number_of_pages = ceil($n / $results_per_page);
            $page_results = ($pageno - 1) * $results_per_page;
            $guideTable_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
            $guideTable_num = $guideTable_rs->num_rows;

            for ($x = 0; $x < $guideTable_num; $x++) {
                $guideTable_data = $guideTable_rs->fetch_assoc();

            ?>
                <tr style="font-size: small;">
                    <td><?php echo $guideTable_data["name"] ?></td>
                    <td><?php echo $guideTable_data["address"] ?></td>
                    <td><?php echo $guideTable_data["mobile"] ?></td>
                    <th><?php echo $guideTable_data["rating"] ?></th>

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
    <!-- pagination -->
    <div class="col-10 offset-1 mt-3 d-flex justify-content-center align-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination  justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                        <span aria-hidden="true"><i class="bi bi-arrow-left-circle-fill"></i></span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                        <span aria-hidden="true"><i class="bi bi-arrow-right-circle-fill"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- pagination -->
</div>