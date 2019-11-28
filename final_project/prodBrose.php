<?php

//require_once 'dbconnect.php';

// if (isset($_POST['btn_single'])) {
// 	$_SESSION['room_type'] = "single room";
// }
// else if (isset($_POST['btn_standard'])) {
// 	$_SESSION['room_type'] = "standard";
// }
// else if (isset($_POST['btn_suit'])) {
// 	$_SESSION['room_type'] = "suit";
// }
// else if (isset($_POST['btn_business'])) {
// 	$_SESSION['room_type'] = "business room";
// }
// else if (isset($_POST['btn_president'])) {
// 	$_SESSION['room_type'] = "president room";
// }
// else if (isset($_POST['btn_delux'])) {
// 	$_SESSION['room_type'] = "delux room";
// }
// else if (isset($_POST['btn_studio'])) {
// 	$_SESSION['room_type'] = "studio";
// }
//$DBcon->close();
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<center>
	<?php
    $queryAll = $DBcon->query("SELECT prod_id, prod_name, amount
    	FROM products
    	WHERE amount > 0 ");
    ?>

	<form method="post" >

		<div class="w3-row-padding">
		    <?php
                	while ($all = $queryAll->fetch_array()) {
                ?>
			<div class="w3-third w3-container w3-margin-bottom">
				<?php
                $imgName = $all['prod_name'];
                $imgName = $imgName . ".png";
				?>
				<img src="<?php echo $imgName ?>" class="w3-round-small" alt="Norway" style="width:100%" class="w3-hover-opacity">
				<label>Remain: <?php echo $all['amount']; ?></label>
				<button type="submit" class="btn btn-default" name="btn_single" id="btn_single">
					View More
				</button>
			</div>
			<?php
            }
            ?>
		</div>
	</form>

</center>

