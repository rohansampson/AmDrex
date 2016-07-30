<?php
$servername = "localhost";
$database = "sekgroup 2";
// Create connection

$conn = mysqli_connect($servername, $database);
mysqli_select_db($conn,$database);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>