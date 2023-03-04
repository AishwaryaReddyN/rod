<?php

function retrieveUserRole($conn, $userId)
{
    $query = "SELECT `role` FROM `users` WHERE `id` = '$userId'";
    $result = mysqli_query($conn, $query);
    return $result;
}