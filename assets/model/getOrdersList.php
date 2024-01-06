<?php

require "sqlConnection.php";

class getOrders
{

    public static function getOrderList($order_query, $custom_order_query)
    {

        $response_array = []; 

        $order_table = Database::search($order_query);
        $custom_order_table = Database::search($custom_order_query);

        $order_table_rows = $order_table->num_rows;
        $custom_order_table_rows = $custom_order_table->num_rows;

        $total_row_count = $order_table_rows + $custom_order_table_rows;

        $order_save_data = null;
        $custom_order_save_data = null;

        $order_table_iteration = 0;
        $custom_order_table_iteration = 0;

        for ($table_iteration = 0; $table_iteration < $total_row_count; $table_iteration++) {

            if ($order_save_data == null) {
                $order_table_data = $order_table->fetch_assoc();
                if ($order_table_iteration < $order_table_rows) {
                    // echo ("Read existing tour \n");
                    $order_start_date = $order_table_data["start_date"];
                } else {
                    $order_start_date = '9999-99-99';
                }
                $order_table_iteration++;
            } else {
                $order_table_data = $order_save_data;
            }


            if ($custom_order_save_data == null) {
                $custom_order_table_data = $custom_order_table->fetch_assoc();
                if ($custom_order_table_iteration < $custom_order_table_rows) {
                    $custom_order_start_date = $custom_order_table_data["start_date"];
                    // echo ("Read custom tour \n");
                } else {
                    $custom_order_start_date = '9999-99-99';
                }
                $custom_order_table_iteration++;
            } else {
                $custom_order_table_data = $custom_order_save_data;
            }

            // echo ($order_start_date . " < " . $custom_order_start_date . "<br><br>");

            if ($order_start_date < $custom_order_start_date) {
                $main_data = $order_table_data;
                $tour_name = $main_data["tour_name"];
                $custom_order_save_data = $custom_order_table_data;
                $order_save_data = null;
                // echo ("Tour \n");
            } else {
                $main_data = $custom_order_table_data;
                $tour_name = "Custom Tour";
                $main_data["tour_name"] = $tour_name;
                $order_save_data = $order_table_data;
                $custom_order_save_data = null;
                // echo ("Custom \n");
            }

            array_push($response_array, $main_data);
        }

        return $response_array;
    }
}