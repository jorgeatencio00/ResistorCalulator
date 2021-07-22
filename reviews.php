<!DOCTYPE html>
<?php
  include("dbConnect.php");
$reviewSQL=" SELECT  name, reviewDate, review FROM reviews;";
$result= mysqli_query($conn, $reviewSQL);
$reviews= mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>

<html>
<title>Reviews of our application</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
  <style>
  .checked {
    color: orange;
  }
  </style>
</head>
<body class="w3-light-grey" style="background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="users.php" class="w3-bar-item w3-button w3-text-green w3-hover-red"><b><i class="fa"></i>My Profile</b></a>
  <a href="resistor-calculator.php" class="w3-bar-item w3-button w3-hover-blue w3-text-pink"></i class="fa fa-map-marker w3-margin-right">Calcul</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-red"></i>Log Out</a>
  <a href="write-review.php" class="w3-bar-item w3-button w3-right w3-hover-yellow w3-text-blue"></i>Write a review</a>
</div>
<div class="" >
<h4 class="center grey-text"></h4>
<div class="container">
  <div class="row"align="center">
    <?php foreach ($reviews as $rev) {?>
      <div class="col s6 md3">
        <div class="card z-depth-0">
          <div class="card-content">
            <h6><?php echo "".$rev['name']; ?></h6>
            <h6><?php echo "".$rev['reviewDate']; ?></h6>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <div>
              <?php echo "".$rev['review']; ?>
            </div>
          </div>

        </div>
      </div>
    <?php } ?>
  </div>
</div>
</div>

<?php
if(isset($_POST["review"]))
{
  $name=$_SESSION['username'];
  $currentDate =date('m/d/Y h:i:s a', time());
  $sql="INSERT INTO reviews (name, rating, review, reviewDate) VALUES (?,?,?,?);";

  $query = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($query, $sql))
  {
    header("Location: login.php?SQLerror");
    exit();
  }
  else {
    $ra=5;
    echo $currentDate;
    mysqli_stmt_bind_param($query,"siss",$_POST['uname'],$ra,$_POST['comments'],$currentDate);
    mysqli_stmt_execute($query);
    $addPoints="UPDATE Users SET Points= Points+15 where Username='$name';";
    mysqli_query($conn,$addPoints);
  }

}
 ?>


</body>
