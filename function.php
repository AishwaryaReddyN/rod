<?php

function addUser($conn , $username, $email, $password){

    $sql = "INSERT INTO users(`username`, `email`, `password`) VALUES('$username', '$email', '$password')";
    $query = mysqli_query($conn, $sql);
    return $query;
}
function retrieveUser($conn , $username,$password){
    $sql = "SELECT * FROM users WHERE username='$username'";
    $query = mysqli_query($conn, $sql);
    return $query;
}
 ?>