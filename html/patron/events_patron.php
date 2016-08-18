<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/patron/events_patron.css" />
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
                    <a href="#!" class="breadcrumb">My Events</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <<ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_patron.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>


        </nav>

        <div id="page_title">
            <h4>Events</h4>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6">

                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">Name</th>
                            <th data-field="name">Status</th>
                            <th data-field="price">Date</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        <?php

                            $conn = new mysqli('localhost','ske','ske','skecomplaints');
                            if(! $conn)
                            {
                                die("Connection failed: " . $conn->connect_error);
                            }
							session_start();
							$User_ID= $_SESSION["sessionUserID"];
                            $sql = "SELECT * FROM events WHERE User_ID = ".$User_ID."";
                            $result = $conn->query($sql);

                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                //Creates a loop to loop through results
                                $Event_ID = $row["Event_ID"];
                                $Event_Name = $row["Event_Name"];
                                $Start_Date = $row["Start_Date"];
                                $End_Date = $row["End_Date"];
                                $Locations	= $row["Locations"];
                                $Group_ID = $row["Group_ID"];
                                $Address_ID = $row["Address_ID"];
                                $User_ID = $row["User_ID"];
                                $Status = $row["Status"];

                                echo '
                                <tr id="'.$Event_ID.'">
                                    <form id = "eventDelete" action = "../../php/eventDelete.php" method = "post">
                                        <input name = "eventid" type = "hidden" value = "'.$Event_ID.'" />
                                    </form>
								<tr id="'.$Event_ID.'">
									<form id = "eventEdit" action = "../../php/eventEdit.php" method = "post">
										<input name = "eventid" type = "hidden" value = "'.$Event_ID.'" />
									</form>
                                    <td>'.$Event_ID.'</td>
                                    <td>'.$Status.'</td>
                                    <td>'.$Start_Date.'</td>
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
