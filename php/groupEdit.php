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

	$Group_ID = ($_POST['Egroupid']);
	session_start();
  $_SESSION['GroupID'] = $Group_ID;
    $sql = "SELECT Group_ID, Group_Name, Event_ID, User_ID FROM groups WHERE Group_ID = '".$Group_ID."' ";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
    $Group_ID= $row["Group_ID"];
    $Group_Name= $row["Group_Name"];
	$Event_ID= $row["Event_ID"];
	$User_ID= $row["User_ID"];
	$Groups= $row["Group_ID"];

	break;

  }
?>

<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/admin/groupEdit_admin.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>



    <ul id="nav-mobile" class="side-nav fixed side-nav">
        <br>
        <br>
        <li class="bold"><a href="http://localhost/MIS347/html/admin/profile_admin.php" class="waves-effect waves-teal">Profile</a></li>
            <li class="bold"><a href="http://localhost/MIS347/html/admin/issueManagement_admin.php" class="waves-effect waves-teal">Issues</a></li>
            <li class="bold"><a href="http://localhost/MIS347/html/admin/groupManagement_admin.php" class="waves-effect waves-teal">Groups</a></li>
            <li class="bold"><a href="http://localhost/MIS347/html/admin/eventManagement_admin.php" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer main">
        <nav class="indigo darken-2 topNavBar">

            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Admin</a>
                    <a href="#!" class="breadcrumb">Group Management</a>
                           <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_admin.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn">Logout</a></li>
                    </ul>

                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Groups</h4>
        </div>

        <div id="fab_close">
            <a class="btn-floating btn-large waves-effect waves-light red right button1" href="dashboard_admin.html"><i class="material-icons">close</i></a>
        </div>

        <div id="fab_close">
            <a class="btn-floating btn-large waves-effect waves-light blue right button2"><i class="material-icons">delete</i></a>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6" action="groupEdit2.php" method="post">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate">
                        <label for="name">Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
				<input id="event" name="event" type="text" class="validate">
                        <label for="event">Event</label>
                    </div>
                               </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="users" name="users" type="text" class="validate">
                        <label for="users">Users</label>
                    </div>



                <button class="btn waves-effect waves-light" type="submit" name="action">Save
                    <i class="material-icons right">mode_edit</i>
                </button>

            </form>

        </div>

        <!-- DELETE TILL HERE -->
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $('.chips-placeholder').material_chip({
                placeholder: 'Enter a tag',
                secondaryPlaceholder: '+Tag',
            });
        });
    </script>
</body>

</html>
