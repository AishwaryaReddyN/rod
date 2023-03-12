<?php

if (isset($_REQUEST["alertType"])) {
    $alertType = $_REQUEST["alertType"];
} else {
    $alertType = "primary";
}

if ($alertType == "success") {
    $alertType = "success";
} else if ($alertType == "error") {
    $alertType = "danger";
} else if ($alertType == "warning") {
    $alertType = "warning";
} else if ($alertType == "info") {
    $alertType = "info";
} else {
    $alertType = "primary";
}

if (isset($_REQUEST["alertMainText"])) {
    echo "<div class='alert alert-" . $alertType . " alert-dismissible fade show' role='alert'>
    <strong>" . $_REQUEST["alertMainText"] . "</strong> " . $_REQUEST["alertSubText"] . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
