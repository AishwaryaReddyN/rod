<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/User.php";

if (isset($_REQUEST["signup"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $dept = $_POST["dept"];
    if (!str_contains($email, "@sfc.ac.in")) {
        $email = $email . "@sfc.ac.in";
    }
    $rows = retrieveOne($conn, $email);
    foreach ($rows as $r) {
        if ($email == $r["email"]) {
            header("Location: " . $_ENV['BASE_DIR'] . "views/loginSignup.php?error=userAlreadyExists");
            exit();
        }
    }
    insertOne($conn, "users", ["username", "email", "password", "dept"], [$username, $email, $password, $dept]);
    $_SESSION["username"] = $username;
    header("Location: " . $_ENV['BASE_DIR']);
}

if (isset($_REQUEST["login"])) {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["password"];
    $rows = retrieveOne($conn, $inputEmail);
    foreach ($rows as $r) {
        if ($inputEmail == $r["email"]) {
            echo $inputEmail, $r['email'];
            if (password_verify($inputPassword, $r["password"])) {
                $_SESSION["username"] = $r["username"];
                header("Location:" . $_ENV['BASE_DIR']);
                exit();
            } else {
                header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?error=wrongPassword");
                exit();
            }
        } else {
            header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?error=userDoesNotExist&userType=newUser");
            exit();
        }
    }
}

if (isset($_REQUEST["logout"])) {
    session_destroy();
    header("Location:" . $_ENV['BASE_DIR']);
}
