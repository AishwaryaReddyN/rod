<?php
include "../baseConfig.php";
include $absoluteDir . "/db/db.php";

$getMesg = mysqli_real_escape_string($conn, trim($_POST['queryMessage']));

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data);

// if user query matched to database query we'll show the reply otherwise it go to else statement
if (mysqli_num_rows($run_query) > 0) {
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $reply = $fetch_data['replies'];
    echo $reply;
} else {
    echo "Sorry, I could not get that.";
}
