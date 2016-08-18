<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', '');

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(! $conn)
{
	die('Could not connect');
}

$db_selected = mysql_select_db(DB_NAME, $conn);


	if(! $db_selected)
	{
		die('Cannot use ' . DB_NAME . ': ' . mysql_error());
	}
	session_start();
	$check = $_SESSION['check'];
	$issueTitle = $_POST["issueT"];
	$issueDetail = $_POST["issueD"];
	$user = $_POST["user"];
	$timestamp = date('Y-m-d G:i:s');
	$status = "New";
	$sql = "INSERT INTO issues (Summary, Status, Assign_User, Status, Created_Timestamp, Last_Updated_Timestamp)
	VALUES ('$issueTitle','$issueDetail', '$user', '$status', '$timestamp', '$timestamp')";

if (mysql_query($sql,$conn) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}
if($check == 1)
	header("Location: ../html/patron/issueManagement_patron.php");
else
	header("Location: ../html/admin/issueManagement_admin.php");

mysql_close($conn);


?>
