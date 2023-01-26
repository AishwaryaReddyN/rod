<?php
$host = $_ENV["DB_HOST"];
$username = $_ENV["DB_USERNAME"];
$password = $_ENV["DB_PASSWORD"];
$dbName = $_ENV["DB_DATABASE"];

$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {
    echo
    '<div class="container alert alert-danger alert-dismissible fade show" role="alert">
        <strong>DB Connection Failed</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    die();
}
