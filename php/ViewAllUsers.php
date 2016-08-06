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
	
	$sql = "SELECT User_ID, Username, Email FROM user";
	$result = mysql_query($sql,$conn);
	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
    echo "id: " . $row["User_ID"]. " - Name: " . $row["Username"]. " Email " . $row["Email"] ."<br>";
    $userid = $row["User_ID"];
	$name = $row["Username"];
	$email = $row["Email"];
    }
} else {
    // echo "0 results";
}
mysql_close($conn);
?>