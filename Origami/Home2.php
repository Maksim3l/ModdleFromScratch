<!DOCTYPE html>

<?php
session_start();
include "connection.php";
$ID = "2";
?> 

<head>
<?php if (!isset($_SESSION)) {
    header("Location: home.php");
    die();
} ?>
<link REL="Icon" href="icon.ico"> 
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css.css">
</head>
<style>


</style>
<body>
<div class ="container">
<div class ="header">

<button class="button" onclick="window.location.href='home2.php'">
 Home
</button>
<button class="button" onclick="window.location.href='Forum2.php'">
 Forum
</button>
<button class="button" onclick="window.location.href='Contact2.php'">
 Contact
</button>
<button class="button" onclick="window.location.href='Login2.php'">
 Account
</button>

</div>
<div class ="left">
Origami (japonsko 折り紙) je japonska umetnost, ki temelji na prepogibanju papirja v določeno skulpturo oz. lik. Beseda origami je zloženka iz japonskih besed ori (»pregibanje«) in kami (»papir«). Načrti za razne like so zapisani v diagramih, obstajajo pa tudi navodila v obliki videoposnetkov.
</div>
<div class ="right">
<Center>
<div class="slideshow-container">

<div class="mySlides fade">
<a href="https://www.youtube.com/c/OrigamiPlusTutorials/about">
<img class="image" src="1.jpg" alt=""><div class="text">
<h3>Origami Plus: </h3>Easy origami tutorials with simple step-by-step instructions in photos and videos. Cool original and easy origami models you won't see anywhere else!
</div>
</a>
  <div>
</div>
  <iframe width=1000 height=500 src="https://www.youtube.com/embed/QEnYAzVIMoU"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

<div class="mySlides fade">
<a href="https://www.youtube.com/channel/UCak5gY7JMwK5rWrUX0k7v3Q">
<img class="image" src="2.jpg" alt="">
<div class="text">
<h3>Love Origami: </h3>Welcome to Love Origami, channel dedicated to the art of paper folding, which is often associated with Japanese culture.
</div>
</a>
<div>
</div>
  <iframe width=1000 height=500 src="https://www.youtube.com/embed/25qjLa9ZzBM"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

<div class="mySlides fade">
<a href="https://www.youtube.com/channel/UCjt3wkJYYbyjSJ7hX6ts8gA">
<img class="image" src="3.jpg" alt="">
<div class="text">
<h3>Paper Work: </h3>art and craft 
</div>
</a>
<div>
</div>
  <iframe width=1000 height=500 src="https://www.youtube.com/embed/AW2JHvSl81U"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
  </br>
  <div>
<button class="dot" onclick="currentSlide(1)"></button>
<button class="dot" onclick="currentSlide(2)"></button>
<button class="dot" onclick="currentSlide(3)"></button>
  </div>
</div>



</Center>
<script src="Slider.js"></script>
</div>
<br>
<script src="click.js"></script>
<script src="showSlides.js"></script>
</div>
<div class ="leg">
"leg"
</div>
</div>
</body>
</html>