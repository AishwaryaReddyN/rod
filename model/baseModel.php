<?php
function insertOne($conn, $tableName, $keys, $values)
{
    $keysString = sqlString($keys, "`", ",");
    $valuesString = sqlString($values, "'", ",");
    $sql = "INSERT INTO $tableName($keysString) VALUES($valuesString)";
    $insertedFlag = mysqli_query($conn, $sql);
    return $insertedFlag;
}

function updateOne($conn, $tableName, $arrayItems, $identifierKey, $identifierValue){
    $updateString = updateString($arrayItems);
    $query = "UPDATE $tableName SET $updateString Where $identifierKey = '$identifierValue'";
    mysqli_query($conn, $query);
    return null;
}

function retrieveRecords($conn, $tableName, $values)
{
    $valuesString = sqlStringWithValues($values, "`", "'", " AND ");
    $sql = "SELECT * FROM $tableName WHERE $valuesString";
    $records = mysqli_query($conn, $sql);
    return $records;
}

function retrieveAllRecords($conn, $tableName)
{
    $sql = "SELECT * FROM $tableName";
    $records = mysqli_query($conn, $sql);
    return $records;
}

function deleteRecord($conn, $tableName, $identifier, $identifierValue){
    $query = "DELETE FROM $tableName WHERE $identifier = '$identifierValue'";
    mysqli_query($conn, $query);
    return null;
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

function updateString($arrayItems){
    $newString = "";
    foreach($arrayItems as $key=>$val){
        if($key != "user_id")
            $newString = $newString . $key . " = " . "'" .$val . "'" . ",";
        else
            $newString = $newString . $key . " = " .$val . ",";
    }

    if (count($arrayItems) > 1) {
        $newString = rtrim($newString, ",");
    }
    return $newString;
}