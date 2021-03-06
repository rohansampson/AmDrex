<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
  <link type = "text/css" rel = "stylesheet" href = "../../css/register.css"/>
<<<<<<< HEAD
  <link type = "text/css" rel = "stylesheet" href = "../../css/patron_home.css"/>
=======
  <link type = "text/css" rel = "stylesheet" href = "../../css/patron/dashboard_patron.css"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class = "grey lighten-4">
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



<div class = "mainContainer">
  <nav class="indigo darken-2 topNavBar">
    <div class="nav-wrapper">
      <a href="#!" class="dashboardHeader brand-logo">Patron Dashboard</a>
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

<!-- DELETE THIS FOR ADMIN DASHBOARD -->
  <div class="formContainer card">
    <form class="col s12 l12 m6" action="new.php" method="post">
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

      <div class = "row">
        <div class="input-field col s12 l12 m6">
          <select>
            <option value="" disabled selected>Select a label</option>
            <option value="1" >Option 1</option>
            <option value="2" >Option 2</option>
            <option value="3" >Option 3</option>
          </select>
          <label>Issue Label</label>
        </div>
      </div>
		</>
      <input type="submit" value="submit" a class="waves-effect waves-light btn submitButton"></a>
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
