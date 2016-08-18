<?php
define('DB_NAME', 'skecomplaints');
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); // $config['username'], $config['password'],
    // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
	session_start();
	if($_SESSION['patron'] == 1)
		$User_ID = $_GET["id"];
	else
		$User_ID = $_POST['Euserid'];

	$_SESSION['UserID'] = $User_ID;
    $sql = "SELECT User_Name, Email, Status, Events, Groups FROM user WHERE User_ID = '".$User_ID."' ";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
    $User_Name= $row["User_Name"];
    $Email= $row["Email"];
	$Status= $row["Status"];
	$Events= $row["Events"];
	$Groups= $row["Groups"];
	break;

  }
?>

<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../css/admin/userEdit_admin.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>



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
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Admin</a>
                    <a href="#!" class="breadcrumb">User Management</a>
                    <a href="#!" class="breadcrumb">Edit User</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_admin.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn">Logout</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Users</h4>
        </div>

        <div id="fab_add">
            <a class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">close</i></a>
        </div>


        <div class="formContainer card">
            <form class="col s12 l12 m6" method="post" action="userEdit2.php">

                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" type="text" class="validate" name="uname" value="<?php echo "$User_Name"?>">
                        <label for="name">Name</label>
                    </div>

                    <div class="file-field input-field col s6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" name="profile_pic">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Picture">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" type="text" class="validate" name="email" value="<?php echo "$Email"?>">
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field col s6">
                        <select  value="<?php echo "$Status"?>">
                            <option value="" disabled selected>Status</option>
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                        </select>
                        <label>Status</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="events" type="text" class="validate" name="events"  value="<?php echo "$Events"?>">
                        <label for="users">Events</label>
                    </div>


                    <div class="input-field col s6">
                        <input id="groups" type="text" class="validate" name="groups"  value="<?php echo "$Groups"?>">
                        <label for="groups">Groups</label>
                    </div>

                </div>

                <div class="input-field col s12 l12 m6">
                            <select id="label" name="account">
                                <option value="" disabled selected>Account Category</option>
                                <option value="1">Patron</option>
                                <option value="2">Ops Team</option>
                                <option value="3">Admin</option>
                            </select>
                            <label>User Account</label>
                        </div>

                <div class="row">
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Save
                        <i class="material-icons right">mode_edit</i>
                    </button>
                </div>

            </form>
        </div>

        <!-- DELETE TILL HERE -->
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>
</body>

</html>
