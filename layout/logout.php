<?php 
session_start();
//destroy session
if(isset($_SESSION["user_id"])){
    session_destroy();
    header("location: ../index.php");
}
?>