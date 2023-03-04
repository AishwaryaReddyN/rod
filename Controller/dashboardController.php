<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";
include $absoluteDir . "/model/hallModel.php";
include $absoluteDir . "/model/announcementModel.php";
include $absoluteDir . "/model/userModel.php";
include $absoluteDir . "/model/dashboard.php";

$allHallBookings = null;
$allAnnouncements = null;

// Today's Data
$todaysAnnouncements = retrieveAnnouncementsByDate($conn, date("Y-m-d"));
$todaysHallBookings = retrieveLatestHallBookingsByDate($conn, date("Y-m-d"));

if (isset($_REQUEST["dashboardShowData"])) {
    $userRole = mysqli_fetch_all(retrieveUserRole($conn, $_SESSION['userId']))[0][0];
    $userId = null;
    if ($userRole != "admin") {
        $userId = $_SESSION['userId'];
    }
    if ($_REQUEST["dashboardShowData"] == "hallBookings") {
        $allHallBookings = retrieveHallBookingsByDateRange($conn, $hallBookingsTable, date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d') . ' +30 days')), $userId);
    } else if ($_REQUEST["dashboardShowData"] == "announcements") {
        $allAnnouncements = retrieveAnnouncementsByDateRange($conn, $announcementsTable, date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d') . ' +30 days')), $userId);
    }
}