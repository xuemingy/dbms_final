<?php
session_start();

if (isset($_SESSION['userSession']) != "") {
	header("Location: success.php");
}
require_once 'dbconnect.php';

if (isset($_POST['btn-signup'])){
	$firstName = strip_tags($_POST['firstname']);
    $lastName = strip_tags($_POST['lastname']);
	$customerState = strip_tags($_POST['customerState']);
	$customerCity = strip_tags($_POST['customerCity']);
	$customerStreet = strip_tags($_POST['customerStreet']);
	$customerZip = strip_tags($_POST['customerZip']);
	$customerGender = strip_tags($_POST['customerGender']);
	$customerMrgstatus = strip_tags($_POST['customerMrgstatus']);
	$customerIncome = strip_tags($_POST['customerIncome']);
	$customerAge = strip_tags($_POST['customerAge']);
	$customerPhone = strip_tags($_POST['customerPhone']);
	$customerEmail = strip_tags($_POST['customerEmail']);
 	$customerPass = strip_tags($_POST['customerPass']);

	$firstName = $DBcon->real_escape_string($firstName);
	$lastName = $DBcon->real_escape_string($lastName);
	$customerState = $DBcon->real_escape_string($customerState);
	$customerCity = $DBcon->real_escape_string($customerCity);
	$customerStreet = $DBcon->real_escape_string($customerStreet);
	$customerZip = $DBcon->real_escape_string($customerZip);
	$customerGender = $DBcon->real_escape_string($customerGender);
	$customerMrgstatus = $DBcon->real_escape_string($customerMrgstatus);
	$customerIncome = $DBcon->real_escape_string($customerIncome);
	$customerAge = $DBcon->real_escape_string($customerAge);
	$customerPhone = $DBcon->real_escape_string($customerPhone);
	$customerEmail = $DBcon->real_escape_string($customerEmail);
 	$customerPass = $DBcon->real_escape_string($customerPass);

	//encrypt password
	$hashed_password = password_hash($customerPass, PASSWORD_DEFAULT);

	$check_email = $DBcon->query("SELECT email
		FROM user
		WHERE email = '$customerEmail'");

	if ($check_email->num_rows != 0) {
		$msg = "<div>
		<h3>
		Sorry email already taken !
		</h3>
		</div>";
	}
	else {
	    $customer_kind = 1;
		$query1 = "INSERT INTO customers (first_name, last_name, street, zipcode, city_id, custkind_id)
		VALUES ('$firstName', '$lastName', '$customerStreet', '$customerZip', '$customerCity', '$customer_kind') ";
		$DBcon->query("ALTER TABLE customers AUTO_INCREMENT=1 ");//adjust id
 		$DBcon->query($query1);
		$custID = mysqli_insert_id($DBcon);
		$insertHome = "INSERT INTO home (customer_id, mrg_state, gender, age, income)
        VALUES('$custID', '$customerMrgstatus', '$customerGender', '$customerAge', '$customerIncome') ";
        $DBcon->query("ALTER TABLE home AUTO_INCREMENT=1");//adjust id
        $DBcon->query($insertHome);

        $insertUser = "INSERT INTO user (email, password, customer_id)
        VALUES ('$customerEmail', '$hashed_password', '$custID')";
		$DBcon->query("ALTER TABLE user AUTO_INCREMENT=1 ");

		if ($DBcon->query($insertUser) === TRUE) {
			$msg = "<div>
			<h3>
			Successfully registered !
			</h3>
			</div>";
		}
		else {
			$msg = "<div>
			<h3>
			Getting error !
			</h3>
			<p>
			$hashed_password<br>
			$custID
			</p>
			</div>";
		}
	}
	$DBcon->close();
}
?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Register</title>
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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style>
		hr.style-two {
			border: 0;
			height: 1px;
			background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}
		hr.style-four {
			height: 12px;
			border: 0;
			box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
		}

	</style>

</head>

<?php require('header.php'); ?>
<?php require('menu.php'); ?>

<center>
	<form method="post" id="register-form">
		<h2>Sign Up</h2>
		<hr size="5" />

		<?php
		if (isset($msg)){
			echo $msg;
		}
		?>

		<div class="w3-third">
			<label> First Name</label>
			<input type="text" name="firstname" class="form-control" style = "width:80%" placeholder="First name" required />
			<label> Last Name</label>
            <input type="text" name="lastname" class="form-control" style = "width:80%" placeholder="Last name" required />
			<label> Gender</label>
			<input type="text" name="customerGender" class="form-control" style = "width:80%" placeholder="M/F" required />
		</div>

		<div class="w3-third">
			<label> Your Age</label>
			<input type="number" name="customerAge" class="form-control" style = "width:80%" placeholder="ex:20" required />
			<label> Phone Number</label>
			<input type="text" name="customerPhone" class="form-control" style = "width:80%" placeholder="ex:+1 (123)456-9000" required />
			<label> Marriage Status</label>
            <input type="text" name="customerMrgstatus" class="form-control" style = "width:80%" placeholder="ex: Y" required />

		</div>

		<div class="w3-third">
			<label> Email</label>
			<input type="text" name="customerEmail" class="form-control" style = "width:80%" placeholder="ex:info@example.com" required />
			<label> Password</label>
			<input type="password" name="customerPass" class="form-control" style = "width:80%" placeholder="6~14 numbers + characters" required />
			<label> Income</label>
            <input type="text" name="customerIncome" class="form-control" style = "width:80%" placeholder="ex:10000" required />

		</div>

		<hr/>
		<br>
		<h3 class="form-group">Your Address</h3><br>
		<hr class ="style-four"/>

    <div class="form-group">
    	<label>State</label>
    	<select name="customerState" class="form-control" style = "width:80%" required>
        <option value selected ></option>
        <?php
        $sql = "SELECT state_id, statename FROM state";
        $result = $DBcon->query($sql);
        if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
               echo '<option value="'.$row["state_id"].'">'.$row["statename"].'</option>';
           }
        }
        ?>
        </select>
    </div>

	<div class="form-group">
    	<label>City</label>
    	<select name="customerCity" class="form-control" style = "width:80%" required>
          <option value selected ></option>
          <?php
          $sql = "SELECT city_id, cityname FROM city";
          $result = $DBcon->query($sql);
          if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 echo '<option value="'.$row["city_id"].'">'.$row["cityname"].'</option>';
             }
          }
          ?>
          </select>
    </div>

	<div class="form-group">
		<label>Street</label>
		<input type="text" name="customerStreet" class="form-control" style = "width:80%" placeholder="ex: Fifth Ave." required />
	</div>

	<div class="form-group">
		<label>Zipcode</label>
		<input type="number" name="customerZip" class="form-control" style = "width:80%" placeholder="ex:15213" required />
	</div>

	<hr size="5" />

	<div>
		<br>
		<button type="submit" class="btn btn-default" name="btn-signup">
			<span></span> Create Account
		</button>
		<br>
		<br>
		<a id="login" href="signin.php" class="btn btn-default">Already have an account? Click  here to log in</a>
	</div>
</form>
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>
</center>

<?php require('footer.php'); ?>