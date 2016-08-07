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
        <li class="bold"><a href="about.html" class="waves-effect waves-teal">Profile</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Issues</a></li>
        <li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Groups</a></li>
        <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Events</a></li>
    </ul>



    <div class="mainContainer">
        <nav class="indigo darken-2 topNavBar">

            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Ops Team</a>
                    <a href="#!" class="breadcrumb">User Management</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="sass.html">Home</a></li>
                        <li><a class="waves-effect waves-light btn">Logout</a></li>
                    </ul>
                </div>
            </div>

        </nav>

        <div id="page_title">
            <h4>Users</h4>
        </div>
                <div class="formContainer card">
            <form class="col s12 l12 m6">

                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">Name</th>
                            <th data-field="name">Last Active</th>
                            <th data-field="price">Groups</th>
                            <th data-field="action"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Hector</td>
                            <td>MM/DD/YY</td>
                            <td>Group 1,..3 more</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Alexander</td>
                            <td>MM/DD/YY</td>
                            <td>Group 2</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Oliver</td>
                            <td>MM/DD/YY</td>
                            <td>Group 15,..7 more</td>
                            <td>
                                <a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>
                            </td>
                        </tr>
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