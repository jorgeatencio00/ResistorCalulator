<?php
if(isset($_POST["log_in"]))
{
    if(isset($_POST['psswd2']) &&isset($_POST['psswd1']))
    {
      include("dbConnect.php");
      $psswd =$_POST['psswd1'];
      $psswd2 =$_POST['psswd2'];
      if ($_POST['psswd1'] != $_POST['psswd2'])
        {

          header("Location: newPassword.php?password%do%not&match!");
        }

      else {
            $hashedPWD= password_hash($psswd, PASSWORD_DEFAULT);
            $sql = "UPDATE Users SET Passwd =? WHERE Username =?";
            $query = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($query, $sql))
            {
              header("Location: login.php?SQLerror");
              exit();
            }
            else {
              mysqli_stmt_bind_param($query,"ss",$hashedPWD, $_SESSION['username']);
              mysqli_stmt_execute($query);
              session_destroy();
              header("Location: login.php?password%reset=succes!");
              exit();
             }
        }
    }
}

else {
    header("Location: login.php?cannot%access=0&change!password&that%way");
    exit();
  }


 ?>
