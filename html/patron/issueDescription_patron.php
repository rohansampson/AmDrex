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
	$Issues_ID = $_GET["id"];
    $sql = "SELECT Created_Timestamp, Last_Update_Timestamp, First_Response_Timestamp, Completed_Timestamp, Summary, Status, 
	First_Response_User, Completed_Timestamp, Description, Label, Location 
	FROM issues WHERE Issues_ID= ".$Issues_ID." ";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
    $Summary= $row["Summary"];
    $Status= $row["Status"];
	$Created_Timestamp= $row["Created_Timestamp"];
	$Last_Update_Timestamp= $row["Last_Update_Timestamp"];
	$First_Response_Timestamp= $row["First_Response_Timestamp"];
	$Completed_Timestamp= $row["Completed_Timestamp"];
	$First_Response_User= $row["First_Response_User"];
	$Completed_Timestamp= $row["Completed_Timestamp"];
	$Description= $row["Description"];
	$Label= $row["Label"];
	$Location= $row["Location"];
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
    <link type="text/css" rel="stylesheet" href="../../css/admin_issueDescription.css" />
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
                    <a href="#!" class="breadcrumb">Issue Description</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_patron.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                    </ul>                </div>

                <ul class="side-nav" id="mobile-demo">
                    <li class="bold"><a href="profile_exp.php" class="waves-effect waves-teal">Profile</a></li>
                    <li class="bold"><a href="issues_patron.php" class="waves-effect waves-teal">Issues</a></li>
                    <li class="bold"><a href="groups_patron.php" class="waves-effect waves-teal">Groups</a></li>
                    <li class="bold"><a href="events_patrons.php" class="waves-effect waves-teal">Events</a></li>
                    <li><a class="waves-effect waves-light btn">Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- DELETE THIS FOR ADMIN DASHBOARD -->
        <a class="btn-floating btn-large waves-effect waves-light lime right" id="fab1"><i class="material-icons">assignment_ind</i></a>
        <a class="btn-floating btn-large waves-effect waves-light pink right" id="fab2"><i class="material-icons">mode_edit</i></a>
        <a class="btn-floating btn-large waves-effect waves-light cyan right" id="fab3"><i class="material-icons">delete</i></a>


        <div class="formContainer card">
            <form class="col s12 l12 m6">

                <h4 id="issueTitle">Issue Name</h4>

                <div class="teal z-depth-1">
                    <div class="row" id="tsStripe1">
                        <div class="col s3">
                            <h6><font color="white"><b>Created Timestamp</b></font></h6>
                        </div>

                        <div class="col s3">
                            <h6><font color="white"><b>Last Updated Timestamp</b></font></h6>
                        </div>

                        <div class="col s3">
                            <h6><font color="white"><b>First Response Timestamp</b></font></h6>
                        </div>

                        <div class="col s3">
                            <h6><font color="white"><b>Completed Timestamp</b></font></h6>
                        </div>
                    </div>

                    <div class="row" id="tsStripe2">
                        <div class="col s3">
                            <h6><font color="white"><?php echo "$Created_Timestamp"; ?></font></h6>
                        </div>

                        <div class="col s3">
                            <h6><font color="white"><?php echo "$Last_Update_Timestamp"; ?></font></h6>
                        </div>

                        <div class="col s3">
                            <h6><font color="white"><?php echo "$First_Response_Timestamp"; ?></font></h6>
                        </div>

                        <div class="col s3">
                            <h6><font color="white"><?php echo "$Completed_Timestamp"; ?></font></font></h6>
                        </div>
                    </div>

                </div>

                <div id="issueSummary">
                     <div class="row">
   	 <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"><?php echo "$Summary"; ?></textarea>
          <label for="textarea1">Issue Summary</label>
        </div>
      </div>
    </form>
  </div>
                    <div class="row">
                        <div class="col s6">
                            <b>Status : </b><font color="green"><?php echo "$Status"; ?></font>
                        </div>

                        <div class="col s6">
                            <!-- Dropdown Trigger -->
                            <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Change</a>
                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="#!">New</a></li>
                                <li><a href="#!">Awaiting User Response</a></li>
                                <li><a href="#!">Assigned</a></li>
                                <li><a href="#!">In Progress</a></li>
                                <li><a href="#!">Complete</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="teal z-depth-1">
                    <div class="row" id="linkedUsers1">
                        <div class="col s6">
                            <h6><font color="white"><b>First Response User</b></font></h6>
                        </div>
                        <div class="col s6">
                            <h6><font color="white"><b>Completed Timestamp</b></font></h6>
                        </div>
                    </div>

                    <div class="row" id="linkedUsers2">
                        <div class="col s6">
                            <h6><font color="white"><?php echo "$First_Response_User"; ?></font></h6>
                        </div>
                        <div class="col s6">
                            <h6><font color="white"><?php echo "$Completed_Timestamp"; ?></font></h6>
                        </div>
                    </div>
                </div>

                <div id="issueDescription">
                     <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea2" class="materialize-textarea"><?php echo "$Description"; ?></textarea>
          <label for="textarea2">Description</label>
        </div>
      </div>
    </form>
  </div>

                </div>

                <div id="chipsLabel">
                    <h5>Issue Label</h5>
                <div class="chip cyan"><i class="close material-icons">close</i>
<font color="white"><?php echo "$Label"; ?></font>
  </div>
                
                    
                </div>

                <div id="chipsLocation">
                    <h5>Location</h5>
                    <div class="chip cyan"><i class="close material-icons">close</i>

                        <font color="white"><?php echo "$Location"; ?></font>
                    </div>
                    <div class="chip cyan"><i class="close material-icons">close</i>

                        <font color="white">Location 2</font>
                    </div>
                    <div class="chip cyan"><i class="close material-icons">close</i>

                        <font color="white">Location 3</font>
                    </div>
                </div>

            </form>
        </div>

        <!-- DELETE TILL HERE -->
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();

            $('.chips').material_chip();
  $('.chips-initial').material_chip({
    data: [{
      tag: 'Issue Label',
    }],
  });
  $('.chips-placeholder').material_chip({
    placeholder: 'Enter a Issue Label',
    secondaryPlaceholder: '+Issue',
  });
        });
 var chip = {
    tag: 'chip content',
    image: '', //optional
    id: 1, //optional
  };
    </script>
</body>

</html>
