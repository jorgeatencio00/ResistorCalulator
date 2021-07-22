<?php
include("dbConnect.php");
if(empty($_SESSION['username']))
{
  header("Location: index.php?You%must#login%fisrt");
  exit();
}
 ?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body class="w3-light-grey" style="background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
">
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="resistor-calculator.php" class="w3-bar-item w3-button w3-text-green w3-hover-red"><b><i class="fa"></i>Calcul</b></a>
  <a href="leaderboard.php" class="w3-bar-item w3-button w3-hover-blue w3-text-blue"></i class="fa fa-map-marker w3-margin-right">Leaderboard</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-red"></i>Log Out</a>
</div>
<h2 style="text-align:center">ResistorCalcApp!</h2>
<form action="logout.php" method="post">
<div class="card">
  <img src="http://3.bp.blogspot.com/-nmCeeVBjvHA/TcqrkChFiiI/AAAAAAAAADI/kWt1R3ZHaz4/s1600/resistor-color-code.gif" alt="Welcome!" style="width:100%">
  <?php
  echo $_SESSION['fname']." ".$_SESSION['lname'];
   ?>
  <p>ResistorCalcApp</p>
  <p>powered by SchmidtJKJ</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-google"></i></a>
    <a href="https://twitter.com/schmidt_jkj"><i class="fa fa-twitter"></i></a>
    <a href="https://www.linkedin.com/in/schmidt-joe-ketner-jean"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
  </div>
  <p><button>Log out</button></p>
</div>
</form>

</body>
</html>
