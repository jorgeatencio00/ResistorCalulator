<?php

// code for logging in
   if(isset($_POST["log_in"]))
   {
       if(isset($_POST['username1']) &&isset($_POST['psswd1']))
       {
         include("dbConnect.php");
         $username =$_POST['username1'];
         $password =$_POST['psswd1'];
         $loginSQL= "SELECT * from Users where Username =?;";
         $query = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($query, $loginSQL))
         {
           header("Location: index.php?SQLerror");
           exit();
         }
         else {
           mysqli_stmt_bind_param($query,"s",$username);
           mysqli_stmt_execute($query);
           $result= mysqli_stmt_get_result($query);
           if($row = mysqli_fetch_assoc($result))
           {

             if(password_verify($password, $row['Passwd']))
             {
               $_SESSION['fname']=$row['First_name'];
              $_SESSION['lname']=$row['Last_name'];
              $_SESSION['username']=$row['Username'];
              $name=$row['Username'];
              $addPoints="UPDATE Users SET Points= Points+5 where Username='$name';";
              mysqli_query($conn,$addPoints);
               header("Location: resistor-calculator.php?login=success");
               exit();
             }
             else {
               header("Location: index.php?err=wrongpassword");
               exit();
             }
           }
           else {
             header("Location: index.php?NoSuchUser");
             exit();
           }
         }

       }

   }


// Code for registration

 else if(isset($_POST['register']))
 {
   include("dbConnect.php");
     if(isset($_POST['psswd']) && isset($_POST['psswd2']))
     {
       if($_POST['psswd'] != $_POST['psswd2'])
       {

         header("Location: index.php?PasswordsDonmtMatch");
         exit();
       }
     }

     if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username']) && isset($_POST['psswd'])&& isset($_POST['psswd2']) )
     {
         $_SESSION['fname']    =  $_POST['fname'];
         $_SESSION['lname']    =  $_POST['lname'];
         $_SESSION['username'] = $_POST['username'];
         $_SESSION['psswd']    = $_POST['psswd'];


         $FN =$_SESSION['fname'];
         $LN =$_SESSION['lname'];
         $UN = $_SESSION['username'];
         $PWD= $_SESSION['psswd'];
         $SQ= $_POST['answer'];
         // Hashing the user's password
         $hashedPWD = password_hash($PWD, PASSWORD_DEFAULT);
         $hashedSQ= password_hash($SQ, PASSWORD_DEFAULT);
         $sql = "INSERT INTO Users (First_name, Last_name, Username, Passwd, securityQ1,viewPreference, Points) VALUES (?,?,?,?,?,?,?);";
         $query = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($query, $sql))
         {
           header("Location: login.php?SQLerror");
           exit();
         }
         else {
           $theme="Light Theme";
           $points=10;
           mysqli_stmt_bind_param($query,"ssssssi",$FN,$LN,$UN,$hashedPWD,$hashedSQ,$theme,$points);
           mysqli_stmt_execute($query);
           header("Location: resistor-calculator.php?registration=success");
           exit();
         }
         header("Location: resistor-calculator.php?registration=success");
         exit();
    }
 }
 else {
   // code...
   header("Location: index.php");
   exit();
 }
