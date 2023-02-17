<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

if (isset($_REQUEST["signup"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $dept = $_POST["dept"];
    if (str_contains($email, "@") && !str_contains($email, "@sfc.ac.in")) {
        $name = explode("@", $email)[0];
        $email = $name . "@sfc.ac.in";
    } else if (!str_contains($email, "@sfc.ac.in")) {
        $email = $name . "@sfc.ac.in";
    }
    $rows = retrieveRecords($conn, 'users', [$email]);
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
    $rows = retrieveRecords($conn, 'users', ['email' => $inputEmail]);
    foreach ($rows as $r) {
        if ($inputEmail == $r["email"]) {
            echo $inputEmail, $r['email'];
            if (password_verify($inputPassword, $r["password"])) {
                $_SESSION["username"] = $r["username"];
                $_SESSION["userId"] = $r["id"];
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