<?php

if (isset($_REQUEST["logout"])) {
    session_destroy();
    header("Location:" . $_ENV['BASE_DIR']);
}