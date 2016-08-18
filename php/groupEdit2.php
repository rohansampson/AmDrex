<?php
       session_start();
       // Create connection
       $conn = new mysqli('localhost','ske','ske','skecomplaints'); // $config['username'], $config['password'],

       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

		$Group_ID = ($_SESSION['GroupID']);
            echo $Group_ID;


       function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


       echo "Connected successfully";

       //get post field
       $Group_Name = test_input($_POST['name']);
       $Event_ID = test_input($_POST['event']);
       $User_ID = test_input($_POST['users']);

      //  $sqlUserFetch = "SELECT userID FROM users WHERE name";


         $sql = "UPDATE groups SET Group_Name = '$Group_Name', Event_ID = '$Event_ID', User_ID = '$User_ID' WHERE Group_ID = '".$Group_ID."'";

       if($conn->query($sql) === TRUE){
         echo "Value Updated successfully";
		 header("Location: ../html/admin/groupManagement_admin.php");
         //Indicate that the person has been registered
       }
       else
         echo " Error: " . $sql . "<br>" . $conn->error;

       $conn->close();

?>
