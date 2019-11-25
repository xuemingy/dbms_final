<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: signin.php");
}

$query = $DBcon->query("SELECT * FROM user WHERE user_id = ".$_SESSION['userSession']);
$userRow = $query->fetch_array();
$DBcon->close();
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- Bootstrap Styles-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
		.mySlides {display:none}
		hr.style-five {
			border: 0;
			height: 0; /* Firefox... */
			box-shadow: 0 0 10px 1px black;
		}
		hr.style-five:after {  /* Not really supposed to work, but does */
			content: "\00a0";  /* Prevent margin collapse */
		}
	</style>
</head>
<?php require('header.php'); ?>
<?php require('menu.php'); ?>
<body>
	<div id="wrapper">
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li>
						<a class="w3-content"><span></span>Hi <?php echo $userRow['c_name'];?><span></span></a>
					</li>
					<li>
						<a  href="index.php"><i class="fa fa-home"></i> Homepage</a>
					</li>
					<li>
						<a id="userchange" class="w3-content" href="change.php">Change Information</a>
					</li>

					<li>
						<a id="logout" class="w3-content" href="logout.php?logout"><span></span>Log Out</a>
					</li>
				</ul>

			</div>

		</nav>
		<div id="page-wrapper" >
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">
							Enjoy Yourself!<small></small>
						</h1>
						<div class="w3-main w3-white">
							<div class="w3-container" id="apartment">
								<h1>The Special Room Rent for Long-term Is Comming Soon!</h1><br>
								<hr/>
								<div class="w3-display-container mySlides">
									<img src="livingroom.jpg" style="width:100%;margin-bottom:-6px">
									<div class="w3-display-bottomleft w3-container w3-black">
										<p>Living Room</p>
									</div>
								</div>
								<div class="w3-display-container mySlides">
									<img src="diningroom.jpg" style="width:100%;margin-bottom:-6px">
									<div class="w3-display-bottomleft w3-container w3-black">
										<p>Dining Room</p>
									</div>
								</div>
								<div class="w3-display-container mySlides">
									<img src="bedroom.jpg" style="width:100%;margin-bottom:-6px">
									<div class="w3-display-bottomleft w3-container w3-black">
										<p>Bedroom</p>
									</div>
								</div>
								<div class="w3-display-container mySlides">
									<img src="livingroom2.jpg" style="width:100%;margin-bottom:-6px">
									<div class="w3-display-bottomleft w3-container w3-black">
										<p>Living Room II</p>
									</div>
								</div>
							</div>
							<div class="w3-row-padding w3-section">
								<div class="w3-col s3">
									<img class="demo w3-opacity w3-hover-opacity-off" src="livingroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)" title="Living room">
								</div>
								<div class="w3-col s3">
									<img class="demo w3-opacity w3-hover-opacity-off" src="diningroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)" title="Dining room">
								</div>
								<div class="w3-col s3">
									<img class="demo w3-opacity w3-hover-opacity-off" src="bedroom.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)" title="Bedroom">
								</div>
								<div class="w3-col s3">
									<img class="demo w3-opacity w3-hover-opacity-off" src="livingroom2.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(4)" title="Second Living Room">
								</div>
							</div>

							<div class="w3-container">
								<h4><strong>The space</strong></h4>
								<div class="w3-row w3-large">
									<div class="w3-col s6">
										<p><i class="fa fa-fw fa-male"></i> Max people: 4</p>
										<p><i class="fa fa-fw fa-bath"></i> Bathrooms: 2</p>
										<p><i class="fa fa-fw fa-bed"></i> Bedrooms: 1</p>
									</div>
									<div class="w3-col s6">
										<p><i class="fa fa-fw fa-clock-o"></i> Check In: After 3PM</p>
										<p><i class="fa fa-fw fa-clock-o"></i> Check Out: 12PM</p>
									</div>
								</div>
								<hr>

								<h4><strong>Amenities</strong></h4>
								<div class="w3-row w3-large">
									<div class="w3-col s6">
										<p><i class="fa fa-fw fa-shower"></i> Shower</p>
										<p><i class="fa fa-fw fa-wifi"></i> WiFi</p>
										<p><i class="fa fa-fw fa-tv"></i> TV</p>
									</div>
									<div class="w3-col s6">
										<p><i class="fa fa-fw fa-cutlery"></i> Kitchen</p>
										<p><i class="fa fa-fw fa-thermometer"></i> Heating</p>
										<p><i class="fa fa-fw fa-wheelchair"></i> Accessible</p>
									</div>
								</div>
								<hr>
							</div>
						</div>                
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
// Slideshow Apartment Images
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
	showDivs(slideIndex += n);
}

function currentDiv(n) {
	showDivs(slideIndex = n);
}

function showDivs(n) {
	var i;
	var x = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("demo");
	if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
			}
			x[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " w3-opacity-off";
		}
</script>

</body>

<?php require('footer.php'); ?>