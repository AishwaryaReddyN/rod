<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

$allHallBookings = null;

if (isset($_REQUEST["dashboardShowData"])) {
    if ($_REQUEST["dashboardShowData"] == "hallBookings") {
        $allHallBookings = retrieveAllRecords($conn, $hallBookingsTable);
    }
}