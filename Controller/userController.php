<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";
include $absoluteDir . "/model/baseModel.php";

if (isset($_REQUEST["signup"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (strlen($password) < 8) {
        header("Location: " . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Password%20too%20short&alertSubText=Please%20enter%20a%20password%20with%20at%20least%208%20characters&userType=newUser");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $dept = $_POST["dept"];
    if (str_contains($email, "@") && !str_contains($email, "@sfc.ac.in")) {
        $name = explode("@", $email)[0];
        $email = $name . "@sfc.ac.in";
    } else if (!str_contains($email, "@sfc.ac.in")) {
        $email = $email . "@sfc.ac.in";
    }

    $matchedRecords = retrieveOneRecord($conn, 'users', ["email" => $email]);
    if (!empty($matchedRecords)) {
        header("Location: " . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Email%20already%20exists&alertSubText=Please%20try%20logging%20in%20or%20use%20a%20different%20email%20address");
        exit();
    }

    insertOne($conn, "users", ["username", "email", "password", "dept", "role"], [$username, $email, $hashedPassword, $dept, "user"]);

    $matchedRecords = retrieveOneRecord($conn, 'users', ['email' => $email]);
    if (!empty($matchedRecords)) {
        $_SESSION["username"] = $matchedRecords["username"];
        $_SESSION["userId"] = $matchedRecords["id"];
        header("Location:" . $_ENV['BASE_DIR'] . "?alertType=success&alertMainText=Account%20created%20successfully.&alertSubText=You%20can%20now%20explore%20the%20features.");
        exit();
    } else {
        header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Something%20went%20wrong&alertSubText=Please%20try%20again");
        exit();
    }
}

if (isset($_REQUEST["login"])) {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["password"];
    $matchedRecords = retrieveOneRecord($conn, 'users', ['email' => $inputEmail]);
    if (!empty($matchedRecords)) {
        if (password_verify($inputPassword, $matchedRecords["password"])) {
            $_SESSION["username"] = $matchedRecords["username"];
            $_SESSION["userId"] = $matchedRecords["id"];
            header("Location:" . $_ENV['BASE_DIR']);
            exit();
        } else {
            header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Incorrect%20password&alertSubText=Please%20try%20again&userType=existingUser");
            exit();
        }
    } else {
        header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Email%20not%20found&alertSubText=Please%20signup&userType=newUser");
        exit();
    }
}
