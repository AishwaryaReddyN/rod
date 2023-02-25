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
    $rows = retrieveRecords($conn, 'users', ["email" => $email]);
    foreach ($rows as $r) {
        if ($email == $r["email"]) {
            header("Location: " . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Email%20already%20exists&alertSubText=Please%20try%20logging%20in%20or%20use%20a%20different%20email%20address");
            exit();
        }
    }
    insertOne($conn, "users", ["username", "email", "password", "dept", "role"], [$username, $email, $hashedPassword, $dept, "user"]);
    $_SESSION["username"] = $username;
    header("Location: " . $_ENV['BASE_DIR']);
}

if (isset($_REQUEST["login"])) {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["password"];
    $rows = retrieveRecords($conn, 'users', ['email' => $inputEmail]);
    var_dump($rows);
    if (mysqli_num_rows($rows) > 0) {
        echo "Email found";
        foreach ($rows as $r) {
            if ($inputEmail == $r["email"]) {
                if (password_verify($inputPassword, $r["password"])) {
                    $_SESSION["username"] = $r["username"];
                    $_SESSION["userId"] = $r["id"];
                    header("Location:" . $_ENV['BASE_DIR']);
                    exit();
                } else {
                    header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Incorrect%20password&alertSubText=Please%20try%20logging%20in%20again");
                    exit();
                }
            }
        }
    } else {
        echo "Email not found";
        header("Location:" . $_ENV['BASE_DIR'] . "views/loginSignup.php?alertType=error&alertMainText=Email%20not%20found&alertSubText=Please%20signup&userType=newUser");
        exit();
    }
}
