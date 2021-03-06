<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/opsteam/groupEdit_opsteam.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>


<body class="grey lighten-4">
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>



    <ul id="nav-mobile" class="side-nav fixed side-nav">
        <br>
        <br>
        <li class="bold"><a href="about.html" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="groupManagement_admin.html" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer main">
        <nav class="indigo darken-2 topNavBar">

            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Ops Team</a>
                    <a href="#!" class="breadcrumb">Event Management</a>
                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Events</h4>
        </div>

        <div id="fab_close">
            <a class="btn-floating btn-large waves-effect waves-light red right button1"><i class="material-icons">close</i></a>
        </div>

        <div class="formContainer card">
            <form class="col s12 l12 m6">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate">
                        <label for="name">Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
				<input id="event" type="text" class="validate">
                        <label for="event">Event</label>
                    </div>
                               </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="users" type="text" class="validate">
                        <label for="users">Users</label>
                    </div>


<form action="#">
  <table>
    <thead>
      <tr>
        <th>Permissions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>View</td>
        <td><input type="checkbox" id="myCheckbox" class="filled-in" /><label  for="myCheckbox">
         <td>Create</td>
        <td><input type="checkbox" id="myCheckbox1" class="filled-in" /><label  for="myCheckbox1">
        </label></td>
         <td>Edit</td>
        <td><input type="checkbox" id="myCheckbox2" class="filled-in" /><label  for="myCheckbox2">
        </label></td>
         <td>Delete</td>
        <td><input type="checkbox" id="myCheckbox3" class="filled-in" /><label  for="myCheckbox3">
        </label></td>

      </tr>
    </tbody>
  </table>
</form>
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
