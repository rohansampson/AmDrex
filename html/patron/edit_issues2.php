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
	$Issues_ID = $_SESSION['IssueID'];
	$issueTitle = $_POST["issueT"];
	$issueDetail = $_POST["issueD"];
	$sql = "UPDATE issues SET Summary = '$issueTitle', Status = '$issueDetail' WHERE Issues_ID = $Issues_ID";

if (mysql_query($sql,$conn) === TRUE) {
    echo "\n Record edited successfully";
	header("Location: ../admin/issueManagement_admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
	header("Location: edit_issues.php");
}

mysql_close($conn);


?>
