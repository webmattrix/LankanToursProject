<?php

session_start();
require "sqlConnection.php";

if (isset($_SESSION["lt_tourist"])) {

    $name = $_POST["touristName"];
    $mobile = $_POST["touristMobile"];
    $dOB = $_POST["touristDOB"];
    $gender = $_POST["touristGender"];
    $country = $_POST["touristCountry"];
    $profileImage = null;
    $profileBackground = null;

    if (isset($_FILES["profileImage"])) {
        $profileImage = $_FILES["profileImage"];
    }
    if (isset($_FILES["profileBackground"])) {
        $profileBackground = $_FILES["profileBackground"];
    }

    function validatePhoneNumber($phoneNumber)
    {
        // Remove any non-digit characters
        $cleanedNumber = preg_replace('/\D/', '', $phoneNumber);

        // Define a regular expression for a valid phone number
        $pattern = '/^\d{10,13}$/'; // Adjust the range based on the expected phone number length
        if (strlen($phoneNumber) >= 10) {
            if (preg_match($pattern, $cleanedNumber)) {
                return true; // Valid phone number
            } else {
                return false; // Invalid phone number
            }
        } else {
            return false; // Invalid phone number
        }
    }

    if (validatePhoneNumber($mobile)) {
        if ($gender != 0) {
            if ($country != 0) {

                $f_name = null;
                $l_name = null;

                $query = "UPDATE `user` SET ";
                $query_status = false;

                if (!empty($name)) {
                    $separatorName = explode(" ", $name);
                    if (sizeof($separatorName) == 2) {
                        $f_name = $separatorName[0];
                        $l_name = $separatorName[1];

                        if ($query_status == false) {
                            $query_status = true;
                            $query .= "`f_name`='" . $f_name . "', `l_name`='" . $l_name . "'";
                        } else {
                            $query .= ", `f_name`='" . $f_name . "', `l_name`='" . $l_name . "'";
                        }
                    } else {
                        $f_name = $separatorName[0];
                        if ($query_status == false) {
                            $query_status = true;
                            $query .= "`f_name`='" . $f_name . "', `l_name`=''";
                        } else {
                            $query .= ", `f_name`='" . $f_name . "', `l_name`=''";
                        }
                    }
                }

                if (!empty($mobile)) {
                    if ($query_status == false) {
                        $query_status = true;
                        $query .= "`mobile`='" . $mobile . "'";
                    } else {
                        $query .= ", `mobile`='" . $mobile . "'";
                    }
                }
                if (!empty($dOB)) {
                    if ($query_status == false) {
                        $query_status = true;
                        $query .= "`dob`='" . $dOB . "'";
                    } else {
                        $query .= ", `dob`='" . $dOB . "'";
                    }
                }
                if (!empty($gender)) {
                    if ($query_status == false) {
                        $query_status = true;
                        $query .= "`gender_id`='" . $gender . "'";
                    } else {
                        $query .= ", `gender_id`='" . $gender . "'";
                    }
                }
                if (!empty($country)) {
                    if ($query_status == false) {
                        $query_status = true;
                        $query .= "`country_id`='" . $country . "'";
                    } else {
                        $query .= ", `country_id`='" . $country . "'";
                    }
                }

                $query .= " WHERE `user`.`email`='" . $_SESSION["lt_tourist"]["email"] . "'";

                Database::iud($query);

                if (!empty($profileImage)) {

                    $img_type = null;
                    if ($profileImage["type"] == "image/jpeg") {
                        $img_type = ".jpeg";
                    } else if ($profileImage["type"] == "image/jpg") {
                        $img_type = ".jpg";
                    } else if ($profileImage["type"] == "image/png") {
                        $img_type = ".png";
                    }


                    $file_path = "../img/profile/user/" . $_SESSION["lt_tourist"]["email"] . "_profile_img" . $img_type . "";
                    move_uploaded_file($profileImage["tmp_name"], $file_path);

                    Database::iud("UPDATE `user` SET `user`.`profile_picture`='" . $_SESSION["lt_tourist"]["email"] . "_profile_img" . $img_type . "' WHERE `user`.`id`='" . $_SESSION["lt_tourist"]["id"] . "'");
                }

                if (!empty($profileBackground)) {

                    $img_type = null;
                    if ($profileBackground["type"] == "image/jpeg") {
                        $img_type = ".jpeg";
                    } else if ($profileBackground["type"] == "image/jpg") {
                        $img_type = ".jpg";
                    } else if ($profileBackground["type"] == "image/png") {
                        $img_type = ".png";
                    }


                    $file_path = "../img/profile/user/" . $_SESSION["lt_tourist"]["email"] . "_profile_background" . $img_type . "";
                    move_uploaded_file($profileBackground["tmp_name"], $file_path);

                    Database::iud("UPDATE `user` SET `user`.`profile_background`='" . $_SESSION["lt_tourist"]["email"] . "_profile_background" . $img_type . "' WHERE `user`.`id`='" . $_SESSION["lt_tourist"]["id"] . "'");
                }

                echo ("1");
            } else {
                echo ("Invalid country selected");
            }
        } else {
            echo ("Invalid gender selected");
        }
    } else { // not a valid phone number
        echo ("Not a valid phone number");
    }
} else {
    echo ("Something goes wrong. Please try again later");
}
