<?php
session_start();
require_once 'dbconnect.php';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<?php include('menu.php'); ?>
<?php include('header.php');?>

<!-- Page content -->
<!-- Edit by Sc-->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="17.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="650">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About YST INSURANCE</h1><br>
      <h5 class="w3-center">Serve since 1977</h5>
      <p class="w3-large">For more than 40 years, YST Insurance has helped individual and institutional customers grow and protect their wealth. We are known for delivering on our promises to our customers, and are recognized as a trusted brand and one of the world’s most admired companies.</p>
      <h5 class="w3-large w3-text-grey w3-hide-medium">Helping people and businesses worldwide with their insurance and financial needs</h5>
      <p class="w3-large w3-text-grey w3-hide-medium">With operations in the United States, Asia, Europe and Latin America, we provide customers with a variety of products and services, including life insurance, annuities, retirement-related services, mutual funds and investment management. We strive to create long-term value for our stakeholders through strong business fundamentals, consistent with our mission guided by our vision and directed by our company's core values.</p>
      <h5 class="w3-large w3-text-grey w3-hide-medium">Serving customers, employees and communities in a highly ethical way</h5>
      <p class="w3-large w3-text-grey w3-hide-medium">We measure our long-term success on our ability to deliver value for shareholders, meet customer needs, attract and develop the best talent in our industry, offer an inclusive work environment where employees can develop to their full potential and give back to the communities where we live and work. We are committed to keeping our promises and doing business the right way.</p>
    </div>
  </div>
  <hr>
  <div class="banner-bottom">
      <!-- 四个动态图片-->
		<div class="container">	
			<div class="agileits_banner_bottom">
				<h3><span>Experience a good stay, enjoy fantastic offers</span> Find our friendly welcoming reception</h3>
			</div>
			<div class="w3ls_banner_bottom_grids">
				<ul class="cbp-ig-grid">
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_road"></span>
							<h4 class="cbp-ig-title">MASTER BEDROOMS</h4>
							<span class="cbp-ig-category">PETER HOTEL</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_cube"></span>
							<h4 class="cbp-ig-title">SEA VIEW BALCONY</h4>
							<span class="cbp-ig-category">PETER HOTEL</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_users"></span>
							<h4 class="cbp-ig-title">LARGE CAFE</h4>
							<span class="cbp-ig-category">PETER HOTEL</span>
						</div>
					</li>
					<li>
						<div class="w3_grid_effect">
							<span class="cbp-ig-icon w3_ticket"></span>
							<h4 class="cbp-ig-title">WIFI COVERAGE</h4>
							<span class="cbp-ig-category">PETER HOTEL</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
        <!-- 菜单 -->
      <h1 class="w3-center">Our Menu</h1><br>
      <h4>Bread Basket</h4>
      <p class="w3-text-grey">Assortment of fresh baked fruit breads and muffins 5.50</p><br>
    
      <h4>Honey Almond Granola with Fruits</h4>
      <p class="w3-text-grey">Natural cereal of honey toasted oats, raisins, almonds and dates 7.00</p><br>
    
      <h4>Belgian Waffle</h4>
      <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
    
      <h4>Scrambled eggs</h4>
      <p class="w3-text-grey">Scrambled eggs, roasted red pepper and garlic, with green onions 7.50</p><br>
    
      <h4>Blueberry Pancakes</h4>
      <p class="w3-text-grey">With syrup, butter and lots of berries 8.50</p>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="tablesetting.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p class="w3-text-grey w3-large"><b>Peter Hotel, 5434 Howe Street , 15213 Pittsburgh, PA</b></p>
    <p>You can also contact us by phone 00553123-2323 or email <a href="mailto:info@example.com">INFO@PETERHOTEL.COM</a>, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="Telephone Number" required name="Tele"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2018-12-06T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  <hr>
<?php include('footer.php');?>
