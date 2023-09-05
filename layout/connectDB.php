<?php
    session_start();
    $_SESSION["user_id"] = 1;
    // session_destroy();

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "earcandy";

    // open connection
    $connection = mysqli_connect($host, $user, $password, $db);

    if ($connection){
    }
    else {
        die("Unable to load data");
    }

?>
