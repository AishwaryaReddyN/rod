<?php

function retrieveHallBookings($conn, $hallName, $hallBookingStartDate, $hallBookingEndDate)
{
    $sql = "SELECT * FROM `hall_bookings` WHERE `hall_name` = '$hallName' AND `hall_booking_date` BETWEEN '$hallBookingStartDate' AND '$hallBookingEndDate'";
    $records = mysqli_query($conn, $sql);
    return $records;
}

function retrieveTimeSlots($conn, $hallBookingDate, $hallName)
{
    $sql = "SELECT `hall_booking_time` FROM `hall_bookings` WHERE `hall_booking_date` = '$hallBookingDate' AND `hall_name` = '$hallName'";
    $records = mysqli_query($conn, $sql);
    return $records;
}


function retrieveHallBookingsByDate($conn, $hallBookingDate)
{
    $sql = "SELECT * FROM `hall_bookings` WHERE `hall_booking_date` = '$hallBookingDate'";
    $records = mysqli_query($conn, $sql);
    return $records;
}

function retrieveLatestHallBookingsByDate($conn, $hallBookingDate)
{
    $hallNames = ["auditorium", "capitanio", "gerosa", "quadrangle"];
    $finalData = array();
    foreach ($hallNames as $hallName) {
        $sql = "SELECT * FROM `hall_bookings` WHERE `hall_booking_date` = '$hallBookingDate' AND `hall_name` = '$hallName' Limit 3";
        $records = mysqli_query($conn, $sql);
        $finalData[$hallName] = $records;
    }
    return $finalData;
}
