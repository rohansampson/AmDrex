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
    $_SESSION['patron'] = 0;
	// Check connection   
    try {	
		$User_ID= $_SESSION["sessionUserID"]; 
    } 
	catch (Exception $e) {
      header('Location: ../html/Login.html');
    }

    $sql = "SELECT Username, Email, User_Name FROM user WHERE User_ID= ".$User_ID." ";
    $result = mysql_query($sql,$conn);
    while($row = mysql_fetch_assoc($result)) {            
    $Username= $row["Username"];
    $User_Name= $row["User_Name"];
    break;
	
  }
?>

<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/dashboard_admin.css" />
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
        <li class="bold"><a href="http://localhost/MIS347/html/admin/profile_admin.php" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="http://localhost/MIS347/html/admin/issueManagement_admin.php" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="http://localhost/MIS347/html/admin/groupManagement_admin.php" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="http://localhost/MIS347/html/admin/eventManagement_admin.php" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">
            <div class="nav-wrapper">
                <a href="#!" class="dashboardHeader brand-logo">Admin Dashboard</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="dashboard_admin.html">Home</a></li>
                    <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li class="bold"><a href="profile_admin.php" class="waves-effect waves-teal">Profile</a></li>
                    <li class="bold"><a href="http://localhost/MIS347/html/admin/issueManagement_admin.php" class="waves-effect waves-teal">Issues</a></li>
                    <li class="bold"><a href="http://localhost/MIS347/html/admin/groupManagement_admin.php" class="waves-effect waves-teal">Groups</a></li>
                    <li class="bold"><a href="http://localhost/MIS347/html/admin/eventManagement_admin.php" class="waves-effect waves-teal">Events</a></li>
                    <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- DELETE THIS FOR ADMIN DASHBOARD -->

        <div class="cardContainer">
            <div class="row">
                <div class="col l8 m8 s12">
                    <div class="card-panel teal lighten-2">
                        <span class="white-text">Choose the administrative duty you would like to fulfil next.
                            Administrative Duties Include - Event Management, Group Management, Issue Management and User Management.
                            Any Changes made by you will be reflected in the database shared by everyone.
                        </span>
                    </div>
                </div>

                <!-- On the right -->
                <div class="col l4 m4 s12">
                    <div class="card-panel z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <img src="../../media/admin_ic.jpg" alt="" class="circle responsive-img">
                                <!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
                                <p>
                                    <ul>
                                        <li><?php echo "$User_Name"; ?></li>
                                        <li><?php echo "$Username"; ?></li>
                                        <li>Administrator</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cards-container">

            <div class="row">
<!--
                <div class="col l3 m3 offset-l9 offset-m9 hide-on-low updatesCard">
                    <div class="card-panel blue-grey lighten-3">
                        <span class="card-title white-text" style="font-size: 1.2em;">Updates</span>
                        <div class="collection">
                            <a href="#!" class="collection-item active">Issues<span class="new badge teal">17</span></a>
                            <a href="#!" class="collection-item">Events<span class="new badge teal">3</span></a>
                            <a href="#!" class="collection-item">Users<span class="new badge teal">24</span></a>
                            <a href="#!" class="collection-item">Groups<span class="new badge teal">11</span></a>
                        </div>
                    </div>
                </div> -->

                <div class="col s12 m8">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../media/issues.jpg">
                            <span class="card-title">Issue Management</span>
                        </div>
                        <div class="card-content">
                            <p>Issue management description. Issue management description. Issue management description.</p>
                        </div>
                        <div class="card-action">
                            <a href="http://localhost/MIS347/html/admin/issueManagement_admin.php">Make Changes</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../../media/events.jpg">
                            <span class="card-title">Event Management</span>
                        </div>
                        <div class="card-content">
                            <p>Event management description. Event management description. Event management description.</p>
                        </div>
                        <div class="card-action">
                            <a href="http://localhost/MIS347/html/admin/eventManagement_admin.php">Make Changes</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../../media/users.jpg">
                            <span class="card-title">User Management</span>
                        </div>
                        <div class="card-content">
                            <p>User management description. User management description. User management description.</p>
                        </div>
                        <div class="card-action">
                            <a href="http://localhost/MIS347/html/admin/userManagement_admin.php">Make Changes</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../../media/groups.jpg">
                            <span class="card-title">Group Management</span>
                        </div>
                        <div class="card-content">
                            <p>Group management description. Group management description. Group management description.</p>
                        </div>
                        <div class="card-action">
                            <a href="http://localhost/MIS347/html/admin/groupManagement_admin.php">Make Changes</a>
                        </div>
                    </div>
                </div>
            </div>



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
