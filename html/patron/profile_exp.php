<?php
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', '');
define('DB_NAME', 'skecomplaints');
    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);	// $config['username'], $config['password'],
   
    if(! $conn)
{
	die('Could not connect');
}

$db_selected = mysql_select_db(DB_NAME, $conn);


	if(! $db_selected)
	{
		die('Cannot use ' . DB_NAME . ': ' . mysql_error());
	}

    session_start(); 
    
	// Check connection   
    try {	
		$User_ID= $_SESSION["sessionUserID"]; 
    } 
	catch (Exception $e) {
      header('Location: ../html/Login.html');
    }
	$_SESSION['patron'] = 1;
    $sql = "SELECT User_ID, Username, Profile_Pic, Email, User_Type FROM user WHERE User_ID= ".$User_ID." ";
    $result = mysql_query($sql,$conn);
    while($row = mysql_fetch_assoc($result)) {            
    $User_ID= $row["User_ID"];
    $Username= $row["Username"];
    $User_Type= $row["User_Type"];
    $Email= $row["Email"];
	$Profile_Pic = $row["Profile_Pic"];
    break;
	
  }
  ?>

<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron_home.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron/profile_patron.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>



    <ul id="nav-mobile" class="side-nav fixed sideNav">
        <br>
        <br>
        <li class="bold"><a href="#" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="issues_patron.php" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="groups_patron.php" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="events_patron.php" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">
            <div class="nav-wrapper">
                <a href="#!" class="dashboardHeader brand-logo">Patron Profile</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                 <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_patron.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                    <li><a href="#">Profile</a></li>
                    <li><a href="groups_patron.php">Groups</a></li>
                    <li><a href="events_patron.php">Events</a></li>
                    <li><a href="issues_patron.php">Issues</a></li>
                    <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="card">
            <form class="col s12 l12 m6">

                <div class="card-header">
                    <img src="../one_life.jpg" alt="profile pic" style="width:200px;height:200px;">
                </div>
                <div class="card-content">
                    <h5><?php echo "$Username"; ?></h5>
                    <br />
                    <h6><?php echo "$Email"; ?></h6>
                </div>

                <a class="btn-floating btn-large waves-effect waves-light red right" id="pp_fab" href=<?php echo "../../php/userEdit.php?id=$User_ID" ?>><i class="material-icons">mode_edit</i></a>

            </form>
        </div>

        <!-- DELETE TILL HERE -->
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</body>

</html>
