<?php
  include("dbConnect.php");
  if(empty($_SESSION['username']))
  {
    header("Location: index.php?You%must#login%fisrt");
    exit();
  }
$leadersSQL=" SELECT First_name, Last_name, Username, Points FROM Users ORDER BY Points desc limit 3;";
$result= mysqli_query($conn, $leadersSQL);
$leaders= mysqli_fetch_all($result,MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Leaderboard</title>
  </head>

</head>
<body class="w3-light-grey" style="background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
">
    <div class="w3-bar w3-white w3-border-bottom w3-xlarge">
      <a href="users.php" class="w3-bar-item w3-button w3-text-green w3-hover-red"><b><i class="fa"></i>My Profile</b></a>
      <a href="resistor-calculator.php" class="w3-bar-item w3-button w3-hover-blue w3-text-blue"></i class="fa fa-map-marker w3-margin-right">Calcul</a>
      <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-red"></i>Log Out</a>
</div>
 <div class="" align="center">
 <h4 class="center grey-text">Top 3 most active users</h4>

 <br>
 <div class="container">
   <div class="row">
     <?php foreach ($leaders as $rev) {?>
       <div class="col s6 md3">
         <div class="card z-depth-0">
           <div class="card-content">

             <?php echo "".$rev['Username']."   ".$rev['Points']." Points"; ?>
             <br>
             </div>
           </div>

         </div>
       </div>
     <?php } ?>
   </div>
 </div>
</body>
