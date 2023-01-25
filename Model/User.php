<?php
function insertOne($conn, $dbName, $keys, $values){
    $keysString = sqlString($keys, "`", ",");
    $valuesString = sqlString($values, "'", ",");
    $sql = "INSERT INTO users($keysString) VALUES($valuesString)";
    $insertedFlag = mysqli_query($conn, $sql);
    return $insertedFlag;
}
function retrieveOne($conn, $email){
    $sql = "SELECT * FROM users WHERE email='$email'";
    $records = mysqli_query($conn, $sql);
    return $records;
}

// Miscellaneous
function sqlString($array, $quote, $delimeter){
    $newString = "";
    foreach ($array as $k) {
        $newString = $newString . $quote . $k . $quote.$delimeter;
    }
    $newString = rtrim($newString, $delimeter);
    return $newString;
}
