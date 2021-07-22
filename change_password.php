<?php

   if(isset($_POST["Continue"]))
   {
       if(isset($_POST['username'])&&isset($_POST['answer']) )
       {
         include("dbConnect.php");
         $username =$_POST['username'];
         $answer = $_POST['answer'];
         $SQL= "SELECT * from Users where Username =?";
         $query = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($query, $SQL))
         {
           header("Location: login.php?SQL%error");
           exit();
         }
         else {
                mysqli_stmt_bind_param($query,"s",$username);
                mysqli_stmt_execute($query);
                $result= mysqli_stmt_get_result($query);
                if($row = mysqli_fetch_assoc($result))
                {
                  if(password_verify($answer, $row['securityQ1']))//||password_verify($answer, $row['securityQ2'])||password_verify($answer, $row['securityQ3'])) // any of these answers is good
                  {
                    $_SESSION['username']=$username;
                    header("Location: newPassword.php?authentication=success");
                    exit();
                  }
                  else {
                    header("Location: resetPassword.php?err=wrong&answer");
                    exit();
                }

              }
            }


          }
          else{
          header("Location: resetPassword.php?choose%a%correct&question");
          exit();
        }
      }
    else {
      header("Location: login.php?cannot%access=0&reset!password&that%way");
      exit();
    }
