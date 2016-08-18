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

	$issueID = ($_POST['Dissueid']);

      $sql = "DELETE FROM issues WHERE Issues_ID = '".$issueID."' ";  //1 for admin, 2 for ops, 3 for patron

		$result = $conn->query($sql);
      if($conn->query($sql)){
         echo "deleted";
      }
      else
        echo " Error: ";
	if($check == 1)
		header("Location: ../html/patron/issues_patron.php");
	else
		header("Location: ../html/admin/issueManagement_admin.php");

      $conn->close();

?>
</body>
</html>
