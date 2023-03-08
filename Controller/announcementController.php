<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

if (isset($_POST['createAnnouncement'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?alertType=error&alertMainText=Not%20Logged%20In!&alertSubText=Please%20login%20and%20try%20again");
        exit();
    }

    $title = $_REQUEST['announcementTitle'];
    $message = $_REQUEST['announcementMessage'];
    $date = $_REQUEST['announcementDate'];
    $time = $_REQUEST['announcementTime'];

    $userId = $_SESSION['userId'];
    insertOne($conn, "announcements", ["announcement_title", "announcement_message", "announcement_date", "announcement_time", "announcement_id", "user_id"], [$title, $message, $date, $time, $uuid->toString(),$userId]);
    header("Location:" . $_ENV['BASE_DIR'] . "views/announcements.php?alertType=success&alertMainText=Announcement%20Successful!&alertSubText=Your%20announcement%20has%20been%20made%20successfully");
    exit();
}
