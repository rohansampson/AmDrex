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
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_patron.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <div id="fab_add">
            <a class="btn-floating btn-large waves-effect waves-light red right" id="fab_add" href="issueSubmit_patron.php"><i class="material-icons">add</i></a>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6">

                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">Issue Name</th>
                            <th data-field="name">Last Updated Timestamp</th>
                            <th data-field="price">Status</th>
                            <th data-field="action"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        define('DB_USER', 'ske');
						define('DB_PASSWORD', 'ske');
						define('DB_HOST', 'localhost');
						$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,'skecomplaints');
                        if(! $conn)
                        {
                            die("Connection failed: " . $conn->connect_error);
                        }

							session_start();
							$User_ID= $_SESSION["sessionUserID"];
							$_SESSION['check'] = 1;
                            $sql = "SELECT * FROM issues WHERE ".$User_ID." = issues.Submitting_User";
                            $result = $conn->query($sql);
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                //Creates a loop to loop through results
                                $Issue_ID = $row["Issues_ID"];
                                $Last_Update_Timestamp = $row["Last_Update_Timestamp"];
                                $Status = $row["Status"];
                                $Summary = $row["Summary"];
                                $Created_Timestamp = $row["Created_Timestamp"];
                                $First_Response_Timestamp = $row["First_Response_Timestamp"];
                                $Completed_Timestamp = $row["Completed_Timestamp"];
                                $Assign_User = $row["Assign_User"];
                                $Description = $row["Description"];
                                $Location = $row["Location"];
                                $Label = $row["Label"];
                                $Comment_ID = $row["Comment_ID"];
								$_SESSION['issueid'] = $Issue_ID;

                                echo '
								<tr id="E'.$Issue_ID.'">
									<form  id="edit_issues" action = "../../php/edit_issues.php" method = "post">
                                        <input name="Eissueid" type = "hidden" value = "'.$Issue_ID.'" />
                                    </form>
                                <tr id="D'.$Issue_ID.'">
                                   <form  id="issueDelete" action = "../../php/issueDelete.php" method = "post">
                                        <input name="Dissueid" type = "hidden" value = "'.$Issue_ID.'" />
                                    </form>
                                    <td><a href="issueDescription_patron.php?id='.$Issue_ID.'">'.$Summary.'</a></td>
                                    <td>'.$Last_Update_Timestamp.'</td>
                                    <td>'.$Status.'</td>
                                    <td>
                                        <button class="btn-floating modal-trigger btn-small waves-effect waves-light blue btn_delete" href="#deleteIssueModal"><i class="material-icons">delete</i></button>
                                        <button class="btn-floating modal-trigger btn-small waves-effect waves-light red btn_edit" href="#editIssueModal"><i class="material-icons">mode_edit</i></a>
                                    </td>
								</tr>
                                </tr>
                                '; // echo end

                            }

                        ?>

                    </tbody>
                </table>

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
