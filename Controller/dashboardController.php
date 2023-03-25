<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";
include $absoluteDir . "/model/hallModel.php";
include $absoluteDir . "/model/announcementModel.php";
include $absoluteDir . "/model/userModel.php";

$allHallBookings = null;
$allAnnouncements = null;

$dashboardData = true;
$bookingData = false;
$announcementData = false;

if (!isset($_SESSION['username'])) {
    header("Location: " . $_ENV['BASE_DIR'] . "/views/loginSignUp.php");
    exit();
}

// Today's Data
$latestAnnouncements = retrieveAnnouncementsByLimit($conn, $announcementsTable, 5);
$latestBookings = retrieveLatestHallBookingsByLimit($conn, $hallBookingsTable, 5);

if (isset($_REQUEST["dashboardShowData"])) {
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
        $dashboardData = false;
        $bookingData = true;
        $announcementData = false;
    } else if ($_REQUEST["dashboardShowData"] == "announcements") {
        if (!empty($userId)) {
            $allAnnouncements = retrieveAnnouncementsByUserId($conn, $announcementsTable, $userId);
        } else {
            $allAnnouncements = retrieveAnnouncementsByDateRange($conn, $announcementsTable, date('Y-m-d'), date('Y-m-d', strtotime(date('Y-m-d') . ' +30 days')), $userId);
        }
        $dashboardData = false;
        $bookingData = false;
        $announcementData = true;
    }
}

if (isset($_REQUEST["searchBooking"])) {
    $bookingId = $_REQUEST["bookingId"];
    $allHallBookings = retrieveHallBookingsByBookingId($conn, $hallBookingsTable, $bookingId);
    $dashboardData = false;
    $bookingData = true;
    $announcementData = false;
}

if (isset($_REQUEST["searchAnnouncement"])) {
    $announcementId = $_REQUEST["announcementId"];
    $allAnnouncements = retrieveAnnouncmentsByAnnouncementId($conn, $announcementsTable, $announcementId);
    $dashboardData = false;
    $bookingData = false;
    $announcementData = true;
}

if (isset($_POST['deleteAnnouncement'])) {
    $announcementId = $_POST["announcementId"];
    deleteRecord($conn, $announcementsTable, 'id', $announcementId);
    header("Location: " . $_ENV['BASE_DIR'] . "/views/dashboard.php?alertType=success&alertMainText=Deletion%20Successful.&alertSubText=Announcement%20deleted%20successfully");
    exit();
}

if (isset($_POST['deleteHallBooking'])) {
    $hallBookingId = $_POST["hallBookingId"];
    deleteRecord($conn, $hallBookingsTable, 'id', $hallBookingId);
    header("Location: " . $_ENV['BASE_DIR'] . "/views/dashboard.php?alertType=success&alertMainText=Deletion%20Successful.&alertSubText=Booking%20deleted%20successfully");
    exit();
}
