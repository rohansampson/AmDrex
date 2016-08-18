<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron/groups_patron.css" />
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
        <nav class="indigo darken-2 topNavBar>        
           <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Patron</a>
                    <a href="#!" class="breadcrumb">My Groups</a>
                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Groups</h4>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6">

                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">Group Name</th>
                            <th data-field="name">Last Issue</th>
                            <th data-field="price">Last Event</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $conn = new mysqli('localhost','ske','ske','skecomplaints');
                        if(! $conn)
                        {
                            die("Connection failed: " . $conn->connect_error);
                        }
							session_start();
							$User_ID= $_SESSION["sessionUserID"];
                            $sql = "SELECT * FROM groups WHERE User_ID = ".$User_ID." ";
                            $result = $conn->query($sql);
                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                //Creates a loop to loop through results
                                $Group_ID = $row["Group_ID"];
                                $Group_Name = $row["Group_Name"];
                                $Event_ID = $row["Event_ID"];

                                echo '
                                <tr id="E'.$Group_ID.'">
                                <form  id="groupEdit" action = "../../php/groupEdit.php" method = "post">
                                    <input name="Egroupid" type = "hidden" value = "'.$Group_ID.'" />
                                </form>
                                <tr id="D'.$Group_ID.'">
                               <form  id="groupDelete" action = "../../php/groupDelete.php" method = "post">
                                    <input name="Dgroupid" type = "hidden" value = "'.$Group_ID.'" />
                                </form>
                                    <td>'.$Group_Name.'</a></td>
                                    <td>'.$Event_ID.'</td>
                                    <td>'.$User_ID.'</td>
                                    </td>
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
    <div id="deleteIssueModal" class="modal deleteModal">
       <div class="modal-content">
         <h4>Delete Group</h4>
       </div>
       <div class="modal-footer">
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id = "deleteIssueConfirmButton">Confirm</a>
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat cancelButton">Cancel</a>
       </div>
     </div>
	<div id="editIssueModal" class="modal editModal">
       <div class="modal-content">
         <h4>Edit Group</h4>
       </div>
       <div class="modal-footer">
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id = "editIssueConfirmButton">Confirm</a>
         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat cancelButton">Cancel</a>
       </div>
     </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
			$('.modal-trigger').leanModal();
        });
    </script>
	<script>
        $("#deleteIssueConfirmButton").click(function(){
            $("#groupDelete").submit();
        });
    </script>
    <script>
        $("#editIssueConfirmButton").click(function(){
            $("#groupEdit").submit();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</body>

</html>
