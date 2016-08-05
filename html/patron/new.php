<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', '');
define('DB_PASSWORD', '');
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
	
	
	$issueTitle = $_POST["issueT"];
	$issueDetail = $_POST["issueD"];
	$sql = "INSERT INTO issues (Summary, Status ) 
	VALUES ('$issueTitle','$issueDetail')";

if (mysql_query($sql,$conn) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($conn);
}

mysql_close($conn);

	
?>