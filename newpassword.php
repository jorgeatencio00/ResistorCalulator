<!DOCTYPE html>
<?php
include("dbConnect.php");
if(empty($_SESSION['user']))
{
    header("Location: login.php?cannot%access=0&change!password&that%way");
    exit();
  }
 ?>

<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta charset="utf-8">
    <title>Resset your password</title>

    <style>
      h3{
          color: red;
        }
        h5{
          color: red;
        }
        body{
          background-color: grey;
            }

      .main{
        max-width: 50%;
        width: 70%;
        margin-left: 250px;
        margin-top: 50px;
      }
      footer{
        background: black;
        color: gray;
        font-size: 12px;
        padding: 20px 20px;
        text-align: center;
      }
      </style>

  </head>


  <body class="w3-light-grey" style="background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed;
  ">

<div class="col-md-4">

  <h3> Change your password </h3>

  <form action="savePasswordChange.php" method="post">

    <div class="form-group">
    <h4>new password</h4>
      <input type="password" name= "psswd1" class="form-control" required>

     <h4>confirm password</h4>
      <input type="password" name="psswd2" class="form-control" required>

    </div>
    <br>
    <button type="submit" name = "log_in"class="btn btn-primary">Validate</button>
  </form>

</div>

</body>
</html>
