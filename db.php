<?php
$connection = mysqli_connect("localhost", "root", "", "hospital_db");

if(!$connection){
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
