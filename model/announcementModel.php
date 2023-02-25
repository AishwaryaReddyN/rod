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
