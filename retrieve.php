<?php
if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
}
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}