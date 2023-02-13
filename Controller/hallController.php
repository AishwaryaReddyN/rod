<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";
include $absoluteDir . "/model/hallModel.php";

$showDate = false;

if (isset($_REQUEST["searchHalls"])) {
    $hallName = $_REQUEST["hallName"];

    // Current timestamp is assumed, so these find first and last day of THIS month
    $first_day_this_month = date('Y-m-01');
    $last_day_this_month = date('Y-m-t');

    $searchedHalls = retrieveHallBookings($conn, $hallName, $first_day_this_month, $last_day_this_month);

    $_SESSION['hallName'] = $_REQUEST['hallName'];
}

if (isset($_REQUEST['bookHall'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?error=notLoggedIn");
        exit();
    }
    $hallName = $_SESSION['hallName'];
    $hallBookingDate = $_REQUEST['hallBookingDate'];
    $hallBookingTime = $_REQUEST['hallBookingTime'];
    $hallBookingPurpose = $_REQUEST['hallBookingPurpose'];
    $userId = $_SESSION['userId'];
    insertOne($conn, "hall_bookings", ["hall_name", "hall_booking_date", "hall_booking_time", "hall_booking_purpose", "user_id"], [$hallName, $hallBookingDate, $hallBookingTime, $hallBookingPurpose, $userId]);
    header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?message=hallBooked");
    exit();
}

if (isset($_POST['decrementMonth'])) {
    $currentMonth = (int) $_SESSION["currentMonth"];
    $currentMonth -= 1;
    $_SESSION["currentMonth"] = $currentMonth;
    header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php");
}

if (isset($_POST['incrementMonth'])) {
    $currentMonth = (int) $_SESSION["currentMonth"];
    $currentMonth += 1;
    $_SESSION["currentMonth"] = $currentMonth;
    header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php");
}

if (isset($_POST['today'])) {
    $_SESSION["currentMonth"] = "0";
    header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php");
}

if (isset($_REQUEST['hallBookingDate'])) {
    // $_SESSION["hallBookingDate"] = $_REQUEST['hallBookingDate'];
    // $hallBookingDayData = retrieveHallBookings($conn, $_REQUEST['hallBookingDate'], $_SESSION['hallName']);
    $showDate = true;
    // header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?calendarAction=showDate");
}