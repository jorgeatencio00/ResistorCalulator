<?php
include("dbConnect.php");
if(empty($_SESSION['username']))
{
  header("Location: index.php?You%must#login%fisrt");
  exit();
}
?>

<html>
<title>Review our application</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey" style="background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="index.php" class="w3-bar-item w3-button w3-text-green w3-hover-red"><b><i class="fa"></i>My Profile</b></a>
  <a href="resistor-calculator.php" class="w3-bar-item w3-button w3-hover-blue w3-text-blue"></i class="fa fa-map-marker w3-margin-right">Calcul</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-red"></i>Log Out</a>
  <a href="reviews.php" class="w3-bar-item w3-button w3-right w3-hover-yellow w3-text-black"></i>See Reviews</a>
</div>
<form class="" action="reviews.php" method="post">
Your name:<br><input type="text" name="uname" required><br><br>
<div class="select">
  <select name="rating">
    <option>AWESOME</option>
    <option value="1">GOOD  </option>
    <option value="2">VERY GOOD</option>
    <option value="3">EXCELLENT</option>
  </select>
  <br>
Your comments:<br>
<textarea name="comments" rows="10" cols="35" required>
</textarea>
</div>

<div class="">
<button type="submit" class"btn btn-primary" name="review" >Post</button>
</form>
</div>
</body>
</html>
