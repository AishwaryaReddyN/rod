<?php

function addUser($conn , $username, $email, $password){
    $sql = "INSERT INTO users(`username`, `email`, `password`) VALUES('$username', '$email', '$password')";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function retrieveUser($conn , $email, $password){
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
 ?>