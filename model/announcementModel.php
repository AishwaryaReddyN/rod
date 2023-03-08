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

function retrieveAnnouncementsByDateRange($conn, $announcementsTable, $announcementsStartDate, $announcementsEndDate, $userId)
{
    if (!empty($userId)) {
        $sql = "SELECT * FROM $announcementsTable WHERE `user_id` = $userId AND `announcement_date` BETWEEN '$announcementsStartDate' AND '$announcementsEndDate'";
    } else {
        $sql = "SELECT * FROM $announcementsTable WHERE `announcement_date` BETWEEN '$announcementsStartDate' AND '$announcementsEndDate'";
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
