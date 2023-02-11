<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

if (isset($_REQUEST["searchHalls"])) {
    $hallName = $_REQUEST["hallName"];

    $searchedHalls = retrieveRecords($conn, 'hall_bookings', ['hall_name' => $hallName, 'status' => 'booked']);
    return $searchedHalls;
}
