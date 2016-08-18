<?php
       session_start();
       // Create connection
       $conn = new mysqli('localhost','ske','ske','skecomplaints'); // $config['username'], $config['password'],

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

		$User_ID = $_SESSION['UserID'];


       function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


       echo "Connected successfully";

       //get post field
       $User_Name = test_input($_POST['uname']);
       $Email = test_input($_POST['email']);
       $Events = test_input($_POST['events']);
       $Groups = test_input($_POST['groups']);
       $Timestamp = $_SERVER['REQUEST_TIME'];

      //  $sqlUserFetch = "SELECT userID FROM users WHERE name";


         $sql = "UPDATE user SET User_Name = '$User_Name', Email = '$Email', Events = '$Events', Groups = '$Groups', Last_Active = '$Timestamp' WHERE User_ID = '".$User_ID."'";

       if($conn->query($sql) === TRUE){
         echo "Value Updated successfully";
		 header("Location: ../html/admin/userManagement_admin.php");
         //Indicate that the person has been registered
       }
       else
         echo " Error: " . $sql . "<br>" . $conn->error;

       $conn->close();

?>
