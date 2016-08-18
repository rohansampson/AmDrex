<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../../css/admin/groupManagement_admin.css" />
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
        <li class="bold"><a href="http://localhost/MIS347/html/admin/userManagement_admin.php" class="waves-effect waves-teal">Users</a></li>
        <li class="bold"><a href="http://localhost/MIS347/html/admin/groupManagement_admin.php" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="http://localhost/MIS347/html/admin/eventManagement_admin.php" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">

            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Admin</a>
                    <a href="#!" class="breadcrumb">Group Management</a>
                            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="dashboard_admin.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn" href="../../php/logout.php">Logout</a></li>
                    </ul>

                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Groups</h4>
        </div>

        <div id="fab_add">
            <a class="btn-floating btn-large waves-effect waves-light red right" id="fab_add" href="groupAdd_admin.html"><i class="material-icons">add</i></a>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6" action="../../php/groupDelete.php" method="post">

                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id" name="Group_Name">Group Name</th>
                            <th data-field="name">Users</th> <!--should be last issue-->
                            <th data-field="price">Last Event</th>
                            <th data-field="action"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $conn = new mysqli('localhost','ske','ske','skecomplaints');
                        if(! $conn)
                        {
                            die("Connection failed: " . $conn->connect_error);
                        }


                            $sql = "SELECT * FROM groups";
                            $result = $conn->query($sql);

                            // output data of each row
                            while($row = $result->fetch_assoc()){
                                //Creates a loop to loop through results
                                $Group_ID = $row["Group_ID"];
                                $Group_Name = $row["Group_Name"];
                                $Event_ID = $row["Event_ID"];
                                $User_ID = $row["User_ID"];

                                echo '
                                <tr id="E'.$Group_ID.'">
                                <form  id="groupEdit" action = "../../php/groupEdit.php" method = "post">
                                    <input name="Egroupid" type = "hidden" value = "'.$Group_ID.'" />
                                </form>
                                <tr id="D'.$Group_ID.'">
                               <form  id="groupDelete" action = "../../php/groupDelete.php" method = "post">
                                    <input name="Dgroupid" type = "hidden" value = "'.$Group_ID.'" />
                                </form>
                                    <td>'.$Group_Name.'</td>
                                    <td>'.$Event_ID.'</td>
                                    <td>'.$User_ID.'</td>
                                    <td>
                                    <button class="btn-floating modal-trigger btn-small waves-effect waves-light blue btn_delete" href="#deleteIssueModal"><i class="material-icons">delete</i></button>
                                    <button class="btn-floating modal-trigger btn-small waves-effect waves-light red btn_edit" href="#editIssueModal"><i class="material-icons">mode_edit</i></a>
                                    </td>
                                </tr>
                                '; // echo end

                            }

                        ?>
                        <!-- <tr>
                            <td>Group 1</td>
                            <td>Issue 17</td>
                            <td>Event 23</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">delete</i></a>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Group 2</td>
                            <td>Issue 8</td>
                            <td>Event 12</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">delete</i></a>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Group 3</td>
                            <td>Issue 21</td>
                            <td>Event 41</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">delete</i></a>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr> -->
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
