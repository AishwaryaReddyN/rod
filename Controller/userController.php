<?php
session_start();
include "../DB/db.php";
include "../Model/User.php";

if (isset($_REQUEST["signup"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    insertOne($conn, "users", ["username", "email", "password"], [$username, $email, $password]);
    header("Location: ../Views/loginSignup.php");

}

if (isset($_REQUEST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rows = retrieveOne($conn, $email);
    foreach ($rows as $r) {
        if ($password == $r["password"]) {
            $_SESSION["username"] = $r["username"];
            header("Location: ../index.php");
        } else {
            echo "No User Found";
        }
    }
}

if (isset($_REQUEST["logout"])) {
    echo "logout";
    session_destroy();
}