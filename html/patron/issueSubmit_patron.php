<?php
define('DB_USER', 'ske');
define('DB_PASSWORD', 'ske');
define('DB_HOST', 'localhost');
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,'skecomplaints'); // $config['username'], $config['password'],
    // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
	session_start();
	$_SESSION['check']= 1;
	$User_ID= $_SESSION["sessionUserID"];
?>

<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron_home.css" />
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
         <li class="bold"><a href="profile_exp.php" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="issues_patron.php" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="groups_patron.php" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="events_patron.php" class="waves-effect waves-teal">Events</a></li>

    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Patron</a>
                    <a href="#!" class="breadcrumb">Issue Management</a>
                    <a href="#!" class="breadcrumb">Issue Submission</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_admin.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                    </ul>
                </div>

                <ul class="side-nav" id="mobile-demo">
                    <li><a href="http://localhost/MIS347/html/admin/profile_admin.php">Profile</a></li>
                    <li><a href="http://localhost/MIS347/html/admin/groupManagement_admin.php">Groups</a></li>
                    <li><a href="http://localhost/MIS347/html/admin/eventManagement_admin.php">Events</a></li>
                    <li><a href="http://localhost/MIS347/html/admin/issueManagement_admin.php">Issues</a></li>
                    <li><a class="waves-effect waves-light btn">Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- DELETE THIS FOR ADMIN DASHBOARD -->
        <div class="formContainer card">

            <form class="col s12 l12 m6" name="issueSubmit" action="../../php/issueSubmit.php" onsubmit="return validateForm()" method="post">

                <div class="row">
                    <div class="input-field col s12 l12 m6">
                        <input id="issueTitle" type="text" class="validate" name="issueT">
                        <label for="issueTitle" data-error="wrong" data-success="right">Issue Title</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 l12 m6">
                        <input id="issueDetail" type="text" class="validate" name="issueD">
                        <label for="issueDetail" data-error="wrong" data-success="right">Issue Details</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 l12 m6">
                        <select id="label">
                            <option value="" disabled selected>Select a label</option>
                            <option value="1">Maintainance</option>
                            <option value="2">Fire</option>
                            <option value="3">Spill</option>
                            <option value="3">Medical</option>
                        </select>
                        <label>Issue Label</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>

        <!-- DELETE TILL HERE -->
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    <script>
        function validateForm() {

            var issueTitle = document.forms["issueSubmit"]["issueTitle"].value;
            if (issueTitle == null || issueTitle == "") {
                alert("Issue Title must be filled out");
                return false;
            }

            var issueDetail = document.forms["issueSubmit"]["issueDetail"].value;
            if (issueDetail == null || issueDetail == "") {
                alert("Issue Detail must be filled out");
                return false;
            }

            var label = document.forms["issueSubmit"]["label"].value;
            if (label == null || label == "") {
                alert("Label must be filled out");
                return false;
            }
        }
    </script>
</body>

</html>
