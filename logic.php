<?php
include "function.php";

$registered = false;
if (isset($_POST["register"])) {
    $result = addUser($conn, $username, $email, $password);
    if ($result) {
        $registered = true;
    } else {
        $registered = false;
        $errorMsg = "Unable to Register User";
    }
}
if (isset($_POST["login"])) {
    $result = retrieveUser($conn, $username, $password);
    foreach ($result as $r) {
        if ($password == $r["password"]) {
            header("Location: ./homepage.html");
        }

    }
}


?>