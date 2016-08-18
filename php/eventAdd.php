<?php
session_start();
// Create connection
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');

     $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,'skecomplaints');	// $config['username'], $config['password'], // $config['username'], $config['password'],
	 // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }


       echo "Connected successfully";

       //get post field
       $Event_Name = test_input($_POST['Event_Name']);
       $Locations = test_input($_POST['Locations']);
       $Street = test_input($_POST['Street']);
       $Users = test_input($_POST['users']);
       $Groups = test_input($_POST['groups']);
       $Start_Date = test_input($_POST['Start_Date']);
       $Start_Date = date("Y-m-d",strtotime($Start_Date));
       $End_Date = test_input($_POST['End_Date']);
       $End_Date = date("Y-m-d",strtotime($End_Date));
       $City = test_input($_POST['City']);
       $Zip = test_input($_POST['Zip']);
       $State = test_input($_POST['State']);
       $Address = ''.$Street.' '.$City.' '.$State.' '.$Zip;

      //  $sqlUserFetch = "SELECT userID FROM users WHERE name";

    //    $session = $_SESSION['sessionUserID'];
         $sql = "INSERT INTO events (Event_Name, Start_Date, End_Date, Address, Locations)
       VALUES('$Event_Name', '$Start_Date', '$End_Date','$Address','$Locations')";

       if($conn->query($sql) === TRUE){
           echo "Value Inserted successfully";
		   header("Location: ../html/admin/dashboard_admin.html");
           //Indicate that the person has been registered
         }
         else
           echo " Error: " . $sql . "<br>" . $conn->error;;
           $conn->close();



       //To prevent sqlInjectio4n
       function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
       }
?>
