<!DOCTYPE html>
<!--首页滚动图片 -->
<!-- Edit by Sc-->
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    * {box-sizing: border-box}
    body {font-family: Verdana, sans-serif; margin:0}
    .mySlides {display: none}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 2s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 2s ease;
    }

    .active, .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 2s;
      animation-name: fade;
      animation-duration: 2s;
    }

    @-webkit-keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }

    @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
  </style>
</head>
<body>

<!-- 在这里添加图片和需要显示的文字-->
  <div class="slideshow-container">

    <div class="mySlides fade">
      <div class="numbertext">1 / 5</div>
      <img src="11.jpg" style="width:100%">
      <div class="text">
        <h3>WORKPLACE SOLUTIONS</h3>
        <p><b>Sharping the future at work.</b></p>
      </div>
    </div>

    <div class="mySlides fade">
     <div class="numbertext">2 / 5</div>
     <img src="12.jpg" style="width:100%">
     <div class="text">
      <h3>INSTITUTIONAL SOLUTIONS</h3>
      <p><b>Experience the YST difference</b></p>
    </div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="13.jpg" style="width:100%">
    <div class="text">
      <h3>LIFE INSURANCE</h3>
      <p><b>Financial security for the ones you love most</b></p>
    </div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="15.jpg" style="width:100%">
    <div class="text">
      <h3>Car Insurance</h3>
      <p><b>Take precautions for your car </b></p>
    </div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="16.jpg" style="width:100%">
    <div class="text">
      <h3>Join Us</h3>
      <p><b>YST INSURANCE, Your best choice.</b></p>
      <div class="agileits_w3layouts_more menu__item">
        <a href="#" data-toggle="modal" data-target="#myModal">Learn More</a>
      </div>  
    </div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>

<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }
    </script>
  </body>
  </html> 

  