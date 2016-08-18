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
	
	$Event_ID = ($_POST['eventid']);

	$sql2 =  "DELETE FROM events WHERE Event_ID= '".$Event_ID."' ";
	if(mysql_query($sql2, $conn) == TRUE)
	{
		echo "DELETED <br>";
		header("Location: ../html/admin/eventManagement_admin.php");
	}
	else
	{
		echo "Error: ". $sql . "<br>" . mysql_error($conn);
		header("Location: ../html/admin/eventManagement_admin.php");
	}
	mysql_close($conn);

?>
