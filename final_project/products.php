<?php
session_start();
require_once 'dbconnect.php';

// if(isset($_GET['h_id'])) {
// 	$_SESSION['hotel_id'] = $_GET['h_id'];
// }
// if (isset($_POST['back_hotel'])){
// 	unset($_SESSION['room_type']);
// 	unset($_SESSION['hotel_id']);
// 	header("Location: hotel.php");
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
	<script type="text/javascript">
    function getStoreId(elementId, storeId) {
        var  myselect=document.getElementById('' + this.elementId);
        //console.log(myselect.name);
        var index = myselect.selectedIndex ;
    	storeId = myselect.options[index].value;
    	console.log(storeId);
    	//alert("getStoreId!");
    }
    </script>
</head>

<?php require('menu.php'); ?>
<?php require('header.php'); ?>

<body>
	<div id="wrapper">
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li>
						<a href="index.php"><i class="fa fa-home"></i> Homepage </a>
					</li>
					<li>
						<a href="products.php" class="w3-content"> Insurance Products </a>
					</li>
				</ul>
			</div>
		</nav>

	<div id="page-wrapper">
		<div id="page-inner">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">
						Make Insurance Easy!<small></small>
					</h1>
					<?php require('prodBrose.php'); ?>
					<form method="post" id="search-room">
						<input type="text" name="search-product" placeholder="Search the hotel you want" style = "width:80%" class="form-control" required>
                        <input type="submit" value="Search" class="btn btn-default" name="search-product-btn">
					</form>

					<hr size="10" />

					<?php
	                //if button is not clicked, show all products
					if (!isset($_POST['search-product-btn'])) {
						$queryAll = $DBcon->query("SELECT prod_id, prod_name, amount, price
                        FROM products
                        WHERE amount > 0");

							if ($queryAll->num_rows > 0) { ?>
								<table class="w3-table-all w3-card-9" style = "width:80%" border="1">
									<tr>
										<th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Store</th>
                                        <th>Sales Person</th>
										<th>Action</th>
									</tr>
									<?php
									while ($all = $queryAll->fetch_array()) { ?>
										<form method="post" action="shop.php?action=addProd&Id=<?php echo $all['prod_id']; ?>">
											<tr>
												<td><?php echo $all['prod_id']; ?></td>
												<td><?php echo $all['prod_name']; ?></td>
												<td><?php echo $all['amount']; ?></td>
												<td><?php echo $all['price']; ?></td>
												<td><input type="text" name="qty" placeholder="1/2/3..." style = "width:80%" class="form-control" required></td>
												<td>
												    <select id="<?php echo $all['prod_id'] ?>" name="selectStore" class="form-control" style = "width:80%" required>
                                                    <option value selected ></option>
                                                    <?php
                                                    $sql = "SELECT store_id, store_name FROM store";
                                                    $result = $DBcon->query($sql);
                                                    if ($result->num_rows > 0) {
                                                       // output data of each row
                                                       while($row = $result->fetch_assoc()) {
                                                           echo '<option value="'.$row["store_id"].'">'.$row["store_name"].'</option>';
                                                       }
                                                    }
                                                    ?>
                                                    </select>
												</td>
												<td>

												    <select name="selectSalesPer" class="form-control" style = "width:80%" required>
                                                    <option value selected ></option>

                                                    <?php
                                                    $storeId;
                                                    echo '<script type="text/javascript">getStoreId('.$all['prod_id'].','.$storeId.' );</script>';
                                                    echo $storeId;
                                                    $sql = "SELECT sid, first_name, last_name FROM salesperson
                                                    WHERE store_id = $storeId";
                                                    $result = $DBcon->query($sql);
                                                    if ($result->num_rows > 0) {
                                                       // output data of each row
                                                       while($row = $result->fetch_assoc()) {
                                                           echo '<option value="'.$row["sid"].'">'.$row["first_name"].'</option>';
                                                       }
                                                    }
                                                    ?>
                                                    </select>
												</td>
												<td>
													<input type="submit" name="add_product" class="btn btn-default" value="Add to cart">
												</td>
											</tr>
										</form>
										<?php
									}
									?>
								</table>
								<?php
							}
						}

						else{
						    //click the button
							$searchProdName = strip_tags($_POST['search-product']);
                            $searchProdName = $DBcon->real_escape_string($searchProdName);
                            $searchQuery = $DBcon->query("SELECT prod_id, prod_name, amount, price
                            	FROM products
                            	WHERE prod_name like '%$searchProdName%'");

                            // no product matches
							if ($searchQuery->num_rows == 0){
								echo "<div>
								<h3>
								Don't have product: $searchProdName, please search again!
								</h3>
								</div>";
								// then show all the products
								$queryAll = $DBcon->query("SELECT prod_id, prod_name, amount, price
                                      	FROM products
                                      	WHERE amount > 0");
								if ($queryAll->num_rows > 0) { ?>
									<table class="w3-table-all w3-card-4" style = "width:80%" border="1">
										<tr>
											<th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Amount</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Store</th>
                                            <th>Action</th>
										</tr>
										<?php
										while ($all = $queryAll->fetch_array()) { ?>
											<form method="post" action="shop.php?action=addProd&ProdId=<?php echo $all['prod_id']; ?>">
												<tr>
													<td><?php echo $all['prod_id']; ?></td>
                                                    <td><?php echo $all['prod_name']; ?></td>
                                                    <td><?php echo $all['amount']; ?></td>
                                                    <td><?php echo $all['price']; ?></td>
                                                    <td><input type="text" name="qty" placeholder="1/2/3..." style = "width:80%" class="form-control" required></td>
                                                    <td>

                                                        <select id="<?php echo $all['prod_id'] ?>" name="selectStore" class="form-control" style = "width:80%" required>
                                                        <option value selected ></option>
                                                        <?php
                                                        $sql = "SELECT store_id, store_name FROM store";
                                                        $result = $DBcon->query($sql);
                                                        if ($result->num_rows > 0) {
                                                           // output data of each row
                                                           while($row = $result->fetch_assoc()) {
                                                               echo '<option value="'.$row["store_id"].'">'.$row["store_name"].'</option>';
                                                           }
                                                        }
                                                        ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                    	<input type="submit" name="add_product" class="btn btn-default" value="Add to cart">
                                                    </td>
												</tr>
											</form>
											<?php
										}
										?>
									</table>
									<?php
								}
								}
								else {
								        // there are products that match the query
								        ?>
										<table class="w3-table-all w3-card-4" style = "width:80%" border="1">
											<tr>
												<th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Store</th>
                                                <th>Action</th>
											</tr>
											<form method="post" action="shop.php?action=addProd&ProdId=<?php echo $searchResult['prod_id']; ?>">
												<tr>
												<?php
                                                   while ($searchResult = $searchQuery->fetch_array()){?>
													<td><?php echo $searchResult['prod_id']; ?></td>
													<td><?php echo $searchResult['prod_name']; ?></td>
													<td><?php echo $searchResult['amount']; ?></td>
                                                    <td><?php echo $searchResult['price']; ?></td>
                                                    <td><input type="text" name="qty" placeholder="1/2/3..." style = "width:80%" class="form-control" required></td>
													<td>
                                                        <select name="selectStore" class="form-control" style = "width:80%" required>
                                                        <option value selected ></option>
                                                        <?php
                                                        $sql = "SELECT store_id, store_name FROM store";
                                                        $result = $DBcon->query($sql);
                                                        if ($result->num_rows > 0) {
                                                           // output data of each row
                                                           while($row = $result->fetch_assoc()) {
                                                               echo '<option value="'.$row["store_id"].'">'.$row["store_name"].'</option>';
                                                           }
                                                        }
                                                        ?>
                                                        </select>
                                                    </td>
													<td>
														<input type="submit" name="add_prod" class="btn btn-default" value="Add to cart">
													</td>
												</tr>
												<?php
                                                }?>
											</form>
										</table>

										<?php
									}
								}
								?>

								<form method="post" id="return">
									<button type="submit" class="btn btn-default" name="back_index" id="back_index">
										Return
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</body>
