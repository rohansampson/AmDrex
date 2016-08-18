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


    echo "Connected successfully";

	$sql = "SELECT User_ID ,Username, Password, User_Type FROM user;";

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
		$account = $row["User_Type"];
		session_start();
		$_SESSION["sessionUserID"] = $userID;
		echo "User Exists";
		if($account == "Patron")
			header("Location: ../patron/profile_exp.php");
		else if($account == "Admin")
			header("Location: ../admin/dashboard_admin.php");
		else
			header("Location: ../opsteam/dashboard_opsteam.php");
		break;
	}

	else {
		$message = "wrong answer";
		echo "<script type='text/javascript'>alert('$message');</script>";
		//Toasts for the future or any not logged in message
		 header("Location: login.html");

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
