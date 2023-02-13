<?php

function retrieveHallBookings($conn, $hallName, $hallBookingStartDate, $hallBookingEndDate)
{
    $sql = "SELECT * FROM `hall_bookings` WHERE `hall_name` = '$hallName' AND `hall_booking_date` BETWEEN '$hallBookingStartDate' AND '$hallBookingEndDate'";
    $records = mysqli_query($conn, $sql);
    return $records;
}