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


       echo "Connected successfully";

	$sql = "SELECT User_ID ,Username, Password FROM user;";

	$result = mysql_query($sql,$conn);
	
	$Username = test_input($_POST['Username']);
    $password = test_input($_POST['Password']);

    //comparing hashes
	if (mysql_fetch_assoc($result) > 0) {
		$salt = $Username + $password;
		$passwordSalt = sha1($password.$salt);

	while($row = mysql_fetch_assoc($result)) {	       
	if($row["Password"] === $passwordSalt && $row["Username"]===$Username){ //user Exists
		$userID= $row["User_ID"];
		$_SESSION["sessionUserID"] = $userID;
		echo "User Exists";
		header("Location: http://localhost:1234/AmDrex/html/patron/profile_patron.html");
		break;
	}

	else {
		$message = "wrong answer";
		echo "<script type='text/javascript'>alert('$message');</script>";
		//Toasts for the future or any not logged in message
		 header("Location: http://localhost:1234/AmDrex/html/shared/login.html");

		//echo "Please enter correct username or password";
	}   
	}


	}
	else {
		//echo "User Doesn't exist";
	}


	

   //To prevent sqlInjection
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }


?>