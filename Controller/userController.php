<?php

if (isset($_REQUEST["register"])) {
    registerUser($_POST["username"], $_POST["email"], $_POST["password"]);
}

function registerUser($username, $email, $password){
    echo $username, $email, $password;
}