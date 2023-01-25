<?php
if (isset($_REQUEST["register"])) {
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];    
}
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
}