<html>
<body>
<?php
$id=$_REQUEST["User_ID"];
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

	
	$sql = 'SELECT User_ID, Username, Email FROM user';
	$retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   $row = mysql_fetch_array($retval, MYSQL_NUM);
   $val = $row[0];
   
	
	$sql2 =  "DELETE FROM user WHERE User_ID=$id";
	$retval2 = mysql_query($sql2, $conn);
	echo "DELETED <br>";
	echo "{$row[0]}";
	 mysql_free_result($retval);	
  
	mysql_close($conn);

?>
</body>
</html>