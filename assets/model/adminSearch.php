<?php
require "sqlConnection.php";
$text = $_GET["text"];

?>

<div class="col-12 table-responsive">
    <table class="table  align-middle table-hover table-striped " style="background-color: rgb(200, 200, 200); border-radius: 10px; font-family:QuickSand; font-size: 14px;">
        <thead class="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col ">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query =  "SELECT * FROM `employee` INNER JOIN `admin` ON employee.id = admin.employee_id WHERE `employee`.`name` LIKE '%" . $text . "%' ";

            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $admin_rs = Database::search($query);
            $n = $admin_rs->num_rows;
            $results_per_page = 3;
            $number_of_pages = ceil($n / $results_per_page);
            $page_results = ($pageno - 1) * $results_per_page;
            $admin_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");
            $admin_num = $admin_rs->num_rows;

            for ($x = 0; $x < $admin_num; $x++) {
                $admin_data = $admin_rs->fetch_assoc();
            ?>
                <tr>

                    <td><?php echo $x + 1 ?></td>
                    <td><?php echo $admin_data["email"] ?></td>
                    <td><?php echo $admin_data["name"] ?></td>
                    <td><?php echo $admin_data["mobile"] ?></td>
                    <td>
                        <button type="button" class="btn" onclick="modalView('<?php echo $admin_data['email']; ?>');">
                            <i class="bi bi-eye-fill fs-4"></i>
                        </button>

                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

</div>
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