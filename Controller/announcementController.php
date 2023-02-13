<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

if (isset($_REQUEST['createAnnouncement'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location:" . $_ENV['BASE_DIR'] . "views/announcements.php?error=notLoggedIn");
        exit();
    }

    $message = $_REQUEST['announcementMessage'];
    $time = $_REQUEST['announcementTime'];

    $userId = $_SESSION['userId'];
    insertOne($conn, "announcements", ["announcement_message", "announcement_time", "user_id"], [$message, $time, $userId]);
    header("Location:" . $_ENV['BASE_DIR'] . "views/announcements.php?message=announcementCreated");
    exit();
}