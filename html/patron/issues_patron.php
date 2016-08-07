<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../../css/register.css" />
    <link type="text/css" rel="stylesheet" href="../../css/patron/issues_patron.css" />
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
                <a href="#!" class="dashboardHeader brand-logo">Patron Issues Submitted</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html">Home</a></li>
                    <li><a class="waves-effect waves-light btn">Logout</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html">Profile</a></li>
                    <li><a href="badges.html">Groups</a></li>
                    <li><a href="collapsible.html">Events</a></li>
                    <li><a href="mobile.html">Issues</a></li>
                    <li><a class="waves-effect waves-light btn">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="formContainer card">
            <a class="btn-floating btn-large waves-effect waves-light red right fab_add"><i class="material-icons">add</i></a>
            <form class="col s12 l12 m6">
                <ul class="collection">
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue">insert_chart</i>
                        <span class="title">Summary 1</span>
                        <br />
                        <div class="chip">
                            Label
                            <i class="close material-icons">close</i>
                        </div>

                        <br>
                        <br />
                        <p>Status: Active/Inactive</p>
                        <p>Created: MM/DD/YY Updated: MM/DD/YY</p>
                        <p>First Respondant: Name</p>
                        <br />
                        <p>A long, eloquent and highly detailed description of the issue as reported.</p>
                        <p>Location: Place</p>
                        <br />
                        <p>Comments: Anthing specific</p>
                        <p>Completed: MM/DD/YY Completing User: Name</p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle green">insert_chart</i>
                        <span class="title">Summary 2</span>
                        <br />
                        <div class="chip">
                            Label
                            <i class="close material-icons">close</i>
                        </div>
                        <br>
                        <br />
                        <p>Status: Active/Inactive</p>
                        <p>Created: MM/DD/YY Updated: MM/DD/YY</p>
                        <p>First Respondant: Name</p>
                        <br />
                        <p>A long, eloquent and highly detailed description of the issue as reported.</p>
                        <p>Location: Place</p>
                        <br />
                        <p>Comments: Anthing specific</p>
                        <p>Completed: MM/DD/YY Completing User: Name</p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">insert_chart</i>
                        <span class="title">Summary 3</span>
                        <br />
                        <div class="chip">
                            Label
                            <i class="close material-icons">close</i>
                        </div>
                        <br>
                        <br />
                        <p>Status: Active/Inactive</p>
                        <p>Created: MM/DD/YY Updated: MM/DD/YY</p>
                        <p>First Respondant: Name</p>
                        <br />
                        <p>A long, eloquent and highly detailed description of the issue as reported.</p>
                        <p>Location: Place</p>
                        <br />
                        <p>Comments: Anthing specific</p>
                        <p>Completed: MM/DD/YY Completing User: Name</p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle yellow">insert_chart</i>
                        <span class="title">Summary 4</span>
                        <br />
                        <div class="chip">
                            Label
                            <i class="close material-icons">close</i>
                        </div>
                        <br>
                        <br />
                        <p>Status: Active/Inactive</p>
                        <p>Created: MM/DD/YY Updated: MM/DD/YY</p>
                        <p>First Respondant: Name</p>
                        <br />
                        <p>A long, eloquent and highly detailed description of the issue as reported.</p>
                        <p>Location: Place</p>
                        <br />
                        <p>Comments: Anthing specific</p>
                        <p>Completed: MM/DD/YY Completing User: Name</p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                </ul>

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