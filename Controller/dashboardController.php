<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";
include $absoluteDir . "/model/hallModel.php";
include $absoluteDir . "/model/announcementModel.php";
include $absoluteDir . "/model/dashboard.php";

$allHallBookings = null;

// Today's Data
$todaysAnnouncements = retrieveAnnouncementsByDate($conn, date("Y-m-d"));
$todaysHallBookings = retrieveLatestHallBookingsByDate($conn, date("Y-m-d"));

if (isset($_REQUEST["dashboardShowData"])) {
    if ($_REQUEST["dashboardShowData"] == "hallBookings") {
        $allHallBookings = retrieveAllRecords($conn, $hallBookingsTable);
    }
}
