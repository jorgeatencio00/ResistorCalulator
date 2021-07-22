<html>
<?php
include("dbConnect.php");
 ?>
  <head>
    <title> Log in or Register </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
      h3{
          color: red;
        }
        .main{
          max-width: 100%;
          width: 100%;
          margin-left: 250px;
          margin-top: 50px;
        }

        h5{
          color: red;
        }
        body{
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


    <div class="main">
      <div class="row">
        <div align="left" class="col-md-2">
          <h2 style="text-align:center">ResistorCalcApp!</h2>
          <div class="card">
            <img src="http://3.bp.blogspot.com/-nmCeeVBjvHA/TcqrkChFiiI/AAAAAAAAADI/kWt1R3ZHaz4/s1600/resistor-color-code.gif" alt="Welcome!" style="width:100%">

        </div>
        </div>
        <br>
        <div class="col-md-4">

          <h3 align="right"> ResistorCalcApp Login </h3>

          <form action="loginCodes.php" method="post">

            <div class="form-group">
              <h5> username </h5>
              <input type="text" name= "username1" class="form-control" required>

              <h5> password </h5>
              <input type="password" name="psswd1" class="form-control" required>

            </div>

            <button type="submit" name = "log_in"class="btn btn-primary"> Log In </button>
            <a href="resetPassword.php" align="right">Forgot your password?</a>
          </form>

	     </div>

	    </div>

        <div class="col-md-4" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
          <h3>Register</h3>
          <form action="loginCodes.php" method="post">

            <div class="form-group">
              <label> First Name </label>
              <input type="text" name="fname" class="form-control" required>

              <label> Last Name </label>
              <input type="text" name="lname" class="form-control" required>

              <label> username </label>
              <input type="text" name="username" class="form-control" required>

              <label> password </label>
              <input type="password" name="psswd" class="form-control" required>

              <label> confirm password </label>
              <input type="password" name="psswd2" class="form-control" required>
              <br>
              <div class="select">
                <select name="security-question">
                  <option>Choose a security question from this list</option>
                  <option value="1">In what city were you born ? </option>
                  <option value="2">What was the make of your first car ? </option>
                  <option value="3">What was your SAT scrore ? </option>
                </select>
                <label >answer</label>
                <input type="text" name="answer" placeholder="enter your answer" class="form-control" required>
                </div>
            </div>

            <button type="submit" name = "register" class="btn btn-primary"> Register </button>
            <br>
            <br>
            </form>
        </div>
    </div>

  </body>

</html>
