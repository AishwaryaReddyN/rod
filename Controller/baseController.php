<?php

if (isset($_REQUEST["logout"])) {
    session_destroy();
    header("Location:" . $_ENV['BASE_DIR'] . "?alertType=success&alertMainText=Logged%20out!&alertSubText=You%20have%20been%20logged%20out%20successfully");
}
