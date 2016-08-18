<html>
<body>
<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,'skecomplaints');


      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

	$userID = ($_POST['Duserid']);

      $sql = "DELETE FROM user WHERE User_ID = '".$userID."' ";  //1 for admin, 2 for ops, 3 for patron

      if($conn->query($sql)){
         echo "deleted";
		 header("Location: ../html/admin/userManagement_admin.php");
      }
      else
        echo " Error: ". sql . $conn->error()."<br>";

      $conn->close();

?>
</body>
</html>
