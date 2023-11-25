<?php
require "sqlConnection.php";

$value = $_GET["value"];

$searchRs;

if($value == "select"){
    $searchRs = Database::search("SELECT * FROM `user`");
}

if($value == "name"){
    $searchRs = Database::search("SELECT * FROM `user` ORDER BY `f_name`,`l_name` ASC");
}else if($value == "email"){
    $searchRs = Database::search("SELECT * FROM `user` ORDER BY `email` ASC");
}else if($value == "date"){
    $searchRs = Database::search("SELECT * FROM `user` ORDER BY `reg_date` ASC");
}

    $users = $searchRs->fetch_all(MYSQLI_ASSOC);

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
                                                foreach ($users as $user) {
                                                ?>
                                                    <tr class="border border-secondary">
                                                        <td><?php
                                                            echo $user['id'];
                                                            ?></td>
                                                        <td><?php
                                                            echo $user['f_name']." ".$user['l_name'];
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
