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
       
	    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
       }
	   
       //get post field
	   
       $nameField = test_input($_POST['nameField']);
       $emailField = test_input($_POST['emailField']);
       $passwordField = test_input($_POST['passwordField']);

       $salt = $nameField + $passwordField;
       $repeatPassword = sha1($passwordField.$salt);

       $sql = "INSERT INTO user (Username, Email, Password) 
           VALUES('$nameField', '$emailField', '$repeatPassword')"; 

       if(mysql_query($sql,$conn) === TRUE){
         echo "Value Inserted successfully";
         //Indicate that the person has been registered
         header("Location: http://localhost:1234/AmDrex/html/shared/login.html");
		
       }
       else
         echo " Error: " . $sql . "<br>" . mysql_error($conn);
       mysql_close($conn);


       //To prevent sqlInjection
      
?>