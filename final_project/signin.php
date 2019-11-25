<?php

session_start();
require_once 'dbconnect.php';

//if already logged in
if (isset($_SESSION['userSession']) != "") {
	header("Location: success.php");
	exit;
}

//get email and password after click
if (isset($_POST['btn_login'])) {
	$userEmail = strip_tags($_POST['email']);
	$userPass = strip_tags($_POST['password']);

	$userEmail = $DBcon->real_escape_string($userEmail);
	$userPass = $DBcon->real_escape_string($userPass);

	//get id email password
	$query = $DBcon->query("SELECT user_id, email, password
							 FROM user
							 WHERE email = '$userEmail'");

	$row = $query->fetch_array();
	$count = $query->num_rows;

	//check
	if (password_verify($userPass, $row['password']) && $count == 1) {
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: success.php");
	}
	else {
		$msg = "<div>
				<h3>
				Invalid Email or Password!
				</h3>
				</div>";
	}
	$DBcon->close();
}
?>

<?php require('header.php'); ?>
<?php require('menu.php'); ?>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
<center>
	<form method="post" id="login-form">
		<h2>Sign In</h2>
		<hr />
		<?php
			if (isset($msg)) {
				echo $msg;
			}
		?>

		<div class="w3-third">
			<p>Email</p>
			<input type="text" name="email" class="form-control" style="width:80%" placeholder="Enter your email" required />
			<span></span>
		</div>

		<div class="w3-third">
			<p>Password</p>
			<input type="password" name="password" class="form-control" style="width:80%" placeholder="Enter your password" required />
		</div>

		<hr />
		<br>
		<button type="submit" class="btn btn-default" name="btn_login" id="btn_login">
			<span></span>Log In
		</button>

		<br>
		<br>
		<p>
		Do not have an account? Click here to sign up!
		</p>
		<a id="signupComp" href="registerComp.php" class="btn btn-default">Company customer sign up!</a>
		<a id="signupIndv" href="registerIndv.php" class="btn btn-default">Individual customer sign up!</a>

	</form>
</center>

<?php require('footer.php'); ?>