<?php
require "db.php";

$age = $_POST['age'];
$enc_name = $_POST['encrypted_name'];
$enc_disease = $_POST['encrypted_disease'];

$sql = "INSERT INTO patients(name, age, disease) VALUES('$enc_name', '$age', '$enc_disease')";

if(mysqli_query($connection, $sql)){
    echo "Data Inserted Successfully <br>";
    echo "<a href='view.php'>View Patients</a>";
} else {
    echo "Error: " . mysqli_error($connection);
}
?>
