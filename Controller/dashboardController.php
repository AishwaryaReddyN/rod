<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";
include $absoluteDir . "/model/hallModel.php";
include $absoluteDir . "/model/announcementModel.php";
include $absoluteDir . "/model/userModel.php";

$allHallBookings = null;
$allAnnouncements = null;

if (!isset($_SESSION['username'])) {
    header("Location: " . $_ENV['BASE_DIR'] . "/views/loginSignUp.php");
    exit();
}

// Today's Data
$todaysAnnouncements = retrieveAnnouncementsByDate($conn, date("Y-m-d"));
$todaysHallBookings = retrieveLatestHallBookingsByDate($conn, date("Y-m-d"));

if (isset($_REQUEST["dashboardShowData"])) {
    echo $_SESSION['userId'];
    $userRole = mysqli_fetch_all(retrieveUserRole($conn, $_SESSION['userId']))[0][0];
    $userId = null;
    if ($userRole != "admin") {
        $userId = $_SESSION['userId'];
    }
    if ($_REQUEST["dashboardShowData"] == "hallBookings") {
        if (!empty($userId)) {
            $allHallBookings = retrieveHallBookingsByUserId($conn, $hallBookingsTable, $userId);
        } else {
            $allHallBookings = retrieveHallBookingsByDateRange($conn, $hallBookingsTable, date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d') . ' +30 days')), $userId);
        }
    } else if ($_REQUEST["dashboardShowData"] == "announcements") {
        if (!empty($userId)) {
            $allAnnouncements = retrieveAnnouncementsByUserId($conn, $announcementsTable, $userId);
        } else {
            $allAnnouncements = retrieveAnnouncementsByDateRange($conn, $announcementsTable, date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d') . ' +30 days')), $userId);
        }
    }
}

if(isset($_POST['deleteAnnouncement'])){
    $announcementId = $_POST["announcementId"];

}