<?php
function insertOne($conn, $dbName, $keys, $values)
{
    $keysString = sqlString($keys, "`", ",");
    $valuesString = sqlString($values, "'", ",");
    $sql = "INSERT INTO $dbName($keysString) VALUES($valuesString)";
    $insertedFlag = mysqli_query($conn, $sql);
    return $insertedFlag;
}
function retrieveRecords($conn, $dbName, $values)
{
    $valuesString = sqlStringWithValues($values, "`", "\"");
    $sql = "SELECT * FROM $dbName WHERE $valuesString";
    var_dump($sql);
    $records = mysqli_query($conn, $sql);
    return $records;
}

// Miscellaneous
function sqlString($array, $quote, $delimeter)
{
    $newString = "";
    foreach ($array as $k) {
        $newString = $newString . $quote . $k . $quote . $delimeter;
    }
    $newString = rtrim($newString, $delimeter);
    return $newString;
}

function sqlStringWithValues($array, $quote, $delimeter)
{
    $newString = "";
    foreach ($array as $k => $v) {
        $newString = $newString . $quote . $k . $quote . "=" . $quote . $v . $quote . $delimeter;
    }
    $newString = rtrim($newString, $delimeter);
    return $newString;
}
