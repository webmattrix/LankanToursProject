<?php
require "sqlConnection.php";

$userId = $_GET['id'];

$result = Database::search("SELECT * FROM `user` WHERE `id`='" . $userId . "'");
$user = $result->fetch_assoc();

?>

<div class="modal-header" style="background-color: white;">
    <span class="fw-bold">Tourist Profile Details</span>
    <button type="button" class="btn btn-danger btn-sm rounded" data-bs-dismiss="modal" aria-label="Close"><iconify-icon icon="carbon:close-filled"></iconify-icon></button>
</div>
<div class="modal-body">
    <div class="row g-3">
        <div class="col-6 text-start">
            <label class="form-label">
                Name
            </label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" value="<?php
                                                                echo $user["name"];
                                                                ?>" disabled />
            </div>
        </div>
        <div class="col-6 text-start">
            <label class="form-label">Mobile</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" value="<?php
                                                                echo $user["mobile"];
                                                                ?>" disabled />
            </div>
        </div>
        <div class="col-6 text-start">
            <label class="form-label">Email</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" value="<?php
                                                                echo $user["email"];
                                                                ?>" disabled />
            </div>
        </div>
        <div class="col-6 text-start">
            <label class="form-label">Country</label>
            <div class="input-group mb-1">
                <?php
                $countryrs = Database::search("SELECT * FROM `country` WHERE `id`='" . $user['country_id'] . "'");
                if ($countryrs->num_rows == 1) {
                    $country = $countryrs->fetch_assoc();
                }
                ?>
                <input type="text" class="form-control" value="<?php echo $country['name']; ?>" disabled />
            </div>
        </div>
        <div class="col-6 text-start">
            <label class="form-label">Gender</label>
            <div class="input-group mb-1">
                <?php
                $genderrs = Database::search("SELECT * FROM `gender` WHERE `id`='" . $user['gender_id'] . "'");
                if ($genderrs->num_rows == 1) {
                    $gender = $genderrs->fetch_assoc();
                }
                ?>
                <input type="text" class="form-control" value="<?php
                                                                echo $gender['name']
                                                                ?>" disabled />
            </div>
        </div>
        <div class="col-6 text-start">
            <label class="form-label">Date of Birth</label>
            <div class="input-group mb-1">
                <input type="text" class="form-control" value="<?php
                                                                echo $user['dob']
                                                                ?>" disabled />
            </div>
        </div>
    </div>
</div>
<div class="modal-header" style="background-color: white;">
    <span class="fw-bold">Registration Information</span>
</div>
<div class="modal-body">
    <div class="row g-3">
        <div class="col-6 text-start">
            <label class="form-label">Tourist ID</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?php
                                                                echo $user['id']
                                                                ?>" disabled />
            </div>
        </div>
        <div class="col-6 text-start">
            <label class="form-label">Registration Date and Time</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="<?php
                                                                echo $user['created_at']
                                                                ?>" disabled />
            </div>
        </div>
    </div>
</div>