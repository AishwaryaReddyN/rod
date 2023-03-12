<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

$existingAnnouncement = null;

if (isset($_POST['upsertAnnouncement'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location:" . $_ENV['BASE_DIR'] . "views/hallBookings.php?alertType=error&alertMainText=Not%20Logged%20In!&alertSubText=Please%20login%20and%20try%20again");
        exit();
    }

    $action = $_REQUEST['upsertAnnouncement'];

    $title = $_REQUEST['announcementTitle'];
    $message = $_REQUEST['announcementMessage'];
    $date = $_REQUEST['announcementDate'];
    $time = $_REQUEST['announcementTime'];
    $announcementId = !empty($_REQUEST['announcementId']) ? $_REQUEST['announcementId'] : $uuid->toString();

    $userId = $_SESSION['userId'];

    if ($action == "create") {
        insertOne($conn, "announcements", ["announcement_title", "announcement_message", "announcement_date", "announcement_time", "announcement_id", "user_id"], [$title, $message, $date, $time, $announcementId, $userId]);
        header("Location:" . $_ENV['BASE_DIR'] . "views/announcements.php?alertType=success&alertMainText=Announcement%20Successful!&alertSubText=Your%20announcement%20has%20been%20made%20successfully");
        exit();
    } else {
        updateOne($conn, $announcementsTable, ["announcement_title" => $title, "announcement_message" => $message, "announcement_date" => $date, "announcement_time" => $time, "user_id" => $userId], "announcement_id", $announcementId);
        header("Location:" . $_ENV['BASE_DIR'] . "views/announcements.php?alertType=success&alertMainText=Updation%20Successful!&alertSubText=Your%20announcement%20has%20been%20updated%20successfully");
        exit();
    }
}

if (isset($_REQUEST['announcementId'])) {
    $announcementId = $_REQUEST['announcementId'];
    $existingAnnouncement = retrieveOneRecord($conn, $announcementsTable, ["announcement_id" => $announcementId]);
}
