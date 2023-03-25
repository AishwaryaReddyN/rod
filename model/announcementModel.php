<?php

function retrieveAnnouncementsByDate($conn, $date)
{
    $sql = "SELECT * FROM `announcements` WHERE announcement_date = '$date' Limit 3";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $announcements = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($announcements, $row);
        }
        return $announcements;
    } else {
        return null;
    }
}

function retrieveAnnouncementsByLimit($conn, $tableName, $limit)
{
    $sql = "SELECT * FROM `$tableName` Limit $limit";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $announcements = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($announcements, $row);
        }
        return $announcements;
    } else {
        return null;
    }
}

function retrieveAnnouncementsByDateRange($conn, $announcementsTable, $announcementsStartDate, $announcementsEndDate, $userId)
{
    if (!empty($userId)) {
        $sql = "SELECT * FROM $announcementsTable WHERE `user_id` = $userId AND `announcement_date` BETWEEN '$announcementsStartDate' AND '$announcementsEndDate'";
    } else {
        $sql = "SELECT * FROM $announcementsTable LEFT JOIN `users` ON `users`.`id` = $announcementsTable.`user_id` WHERE $announcementsTable.`announcement_date` BETWEEN '$announcementsStartDate' AND '$announcementsEndDate'";
    }
    $records = mysqli_query($conn, $sql);
    return $records;
}

function retrieveAnnouncementsByUserId($conn, $announcementsTable, $userId)
{
    $sql = "SELECT * FROM $announcementsTable WHERE `user_id` = $userId ORDER BY `announcement_date` DESC Limit 10";
    $records = mysqli_query($conn, $sql);
    return $records;
}

function retrieveAnnouncmentsByAnnouncementId($conn, $announcementsTable, $announcementId)
{
    $sql = "SELECT * FROM `$announcementsTable` LEFT JOIN `users` ON `users`.`id` = $announcementsTable.`user_id` WHERE `announcement_id` = '$announcementId'";
    $records = mysqli_query($conn, $sql);
    return $records;
}
