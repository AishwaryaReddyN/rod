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
    $valuesString = sqlStringWithValues($values, "`", "'", " AND ");
    $sql = "SELECT * FROM $dbName WHERE $valuesString";
    $records = mysqli_query($conn, $sql);
    return $records;
}

function retrieveAllRecords($conn, $dbName)
{
    $sql = "SELECT * FROM $dbName";
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

function sqlStringWithValues($array, $quote, $delimeter, $seperator)
{
    $newString = "";

    foreach ($array as $k => $v) {
        if (count($array) > 1) {
            $newString = $newString . $quote . $k . $quote . "=" . $delimeter . $v . $delimeter . $seperator;
        } else {
            $newString = $newString . $quote . $k . $quote . "=" . $delimeter . $v . $delimeter;
        }
    }
    if (count($array) > 1) {
        $newString = rtrim($newString, $seperator);
    }
    return $newString;
}

function convertMonthToDate($hallMonth, $mode)
{
    $monthTextToNum = array(
        "jan" => "01",
        "feb" => "02",
        "mar" => "03",
        "apr" => "04",
        "may" => "05",
        "jun" => "06",
        "jul" => "07",
        "aug" => "08",
        "sep" => "09",
        "oct" => "10",
        "nov" => "11",
        "dec" => "12"
    );
    if ($mode == "start") {
        return "01-" . $monthTextToNum[$hallMonth] . "-";
    }
}