<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');

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
	$User_ID= $_SESSION["sessionUserID"];

	$issueTitle = $_POST["issueT"];
	$issueDetail = $_POST["issueD"];
	$sql = "INSERT INTO issues (Summary, Status, Submitting_User)
	VALUES ('$issueTitle','$issueDetail','$User_ID')";

if (mysql_query($sql,$conn) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}
header("Location: ../html/patron/issues_patron.php");
mysql_close($conn);


?>
