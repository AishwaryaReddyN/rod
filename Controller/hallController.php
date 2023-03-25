<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";
include $absoluteDir . "/model/hallModel.php";

$showDate = false;
$showCalendar = false;
$hallName = null;
$bookedTimeSlots = [];

$latestHallBookings = retrieveLatestHallBookings($conn, $hallBookingsTable);

if (isset($_REQUEST["searchHalls"]) || isset($_SESSION['hallName'])) {
    $hallName = isset($_REQUEST["searchHalls"]) ? $_REQUEST["hallName"] : $_SESSION['hallName'];

    // Current timestamp is assumed, so these find first and last day of THIS month
    $first_day_this_month = date('Y-m-01');
    $last_day_this_month = date('Y-m-t');

    $searchedHalls = retrieveHallBookings($conn, $hallName, $first_day_this_month, $last_day_this_month);

    if (!empty($hallName)) {
        $_SESSION['hallName'] = $hallName;
    }
}

if (isset($_REQUEST['upsertBooking'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?alertType=error&alertMainText=Not%20Logged%20In!&alertSubText=Please%20login%20and%20try%20again");
        exit();
    }

    $action = $_REQUEST['upsertBooking'];

    $hallName = !empty($_REQUEST['hallName']) ? $_REQUEST['hallName'] : $_SESSION['hallName'];
    $hallBookingDate = $_REQUEST['hallBookingDate'];
    $hallBookingTime = $_REQUEST['hallBookingTime'];
    $hallBookingPurpose = $_REQUEST['hallBookingPurpose'];
    $userId = $_SESSION['userId'];

    $bookingId = !empty($_REQUEST['bookingId']) ? $_REQUEST['bookingId'] : $uuid->toString();

    if ($action == "create") {
        insertOne($conn, "hall_bookings", ["hall_name", "hall_booking_date", "hall_booking_time", "hall_booking_purpose", "booking_id", "user_id"], [$hallName, $hallBookingDate, $hallBookingTime, $hallBookingPurpose, $bookingId, $userId]);

        // Clear required session variables for Hall Booking
        unset($_SESSION['hallName']);
        unset($_SESSION['currentMonth']);
    
        header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?alertType=success&alertMainText=Booking%20Successful!&alertSubText=Your%20booking%20has%20been%20made%20successfully");
        exit();
    } else {
        updateOne($conn, $hallBookingsTable, ["hall_name" => $hallName, "hall_booking_date" => $hallBookingDate, "hall_booking_time" => $hallBookingTime, "hall_booking_purpose" => $hallBookingPurpose, "user_id" => $userId], "booking_id", $bookingId);
        header("Location:" . $_ENV['BASE_DIR'] . "views/dashboard.php?alertType=success&alertMainText=Updation%20Successful!&alertSubText=Your%20booking%20has%20been%20updated%20successfully");
        exit();
    }
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

if (isset($_REQUEST["hallBookingDate"])) {
    $rows = retrieveTimeSlots($conn, $_REQUEST["hallBookingDate"], isset($_SESSION['hallName']) ? $_SESSION['hallName'] : $hallName);
    foreach ($rows as $row) {
        $bookedTimeSlots[] = $row['hall_booking_time'];
    }
}

if (isset($_REQUEST["hallBookingId"])) {
    $hallBookingId = $_REQUEST["hallBookingId"];
    $existingBooking = retrieveOneRecord($conn, $hallBookingsTable, ["booking_id" => $hallBookingId]);
    $fetchedRecords = retrieveTimeSlots($conn, $existingBooking['hall_booking_date'], $existingBooking['hall_name']);
    foreach ($fetchedRecords as $fr) {
        $bookedTimeSlots[] = $fr['hall_booking_time'];
    }
    $showCalendar = true;
    $showDate = true;
}
