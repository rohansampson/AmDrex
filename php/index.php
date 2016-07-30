<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>MSI347</title>
	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<style>
		body  {
			background-color: #48616c;
		}
		label {
			font-size: 16pt;
			font-family: sans-serif;
			text-align:center;
			line-height:16pt;
			text-align: right;
		}
		p{
			font-size:18pt
		}

		button{

			margin: -20px -50px;
			position:relative;
			top:50%;
			left:50%;
			text-align:center;
		}

	</style>
</head>
<body>
<nav class="indigo lighten-4" role="navigation">
	<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a></div></nav>
<form method = "post" action =reset.php class = "container">
	<div class="row">
		<p class="responsive-text center" style="color:black;"><strong>Please enter your email address</strong></p>
		<div class="input-field">
			<label for="email">Email:</label>
			<input id="email" type="email" class="validate" name = "email" style="color:black">
			<span class="error"></span>
		</div>
	</div>
	<div class = "row">
		<button class="btn waves-effect waves-blue lighten-1" type="submit" name="action">Submit
		</button>

	</div>
	<?php
	include('db.php');
	if(isset($_POST['action']))
	{
		if($_POST['action']=="password")
		{
			$email      = mysqli_real_escape_string($conn,$_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
			{
				$message =  "Invalid email address please type a valid email!!";
			}
			else
			{
				$query = "SELECT email id FROM registration where email id='".$email."'";
				$result = mysqli_query($conn,$query);
				$Results = mysqli_fetch_array($result);

				if(count($Results)>=1)
				{
					$encrypt = md5(90*13+$Results['registration id']);
					$message = "Your password reset link send to your e-mail address.";
					$to=$email;
					$subject="Forget Password";
					$from = 'sinha.ashish19@gmail.com';
					$body='Hi, <br/> <br/>Your Membership ID is '.$Results['registration id'].' <br><br>Click here to reset your password http://localhost.reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br><br>Solve your problems.';
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					mail($to,$subject,$body,$headers);

				}
				else
				{
					$message = "Account not found please signup now!!";
				}
			}
		}
	}
	?>

</form>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
</body>
</html>
