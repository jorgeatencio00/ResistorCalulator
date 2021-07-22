<?php
    $dbServerName = "localhost";
    $dbUsername =  "root";
    $dbPassword = "";
    $dbName =  "resistorcalcapp";
    $conn = mysqli_connect($dbServerName, $dbUsername,$dbPassword, $dbName);        // Connect Database
    if(!$conn)
    {
      echo "Connection erorr!";
    }
    else {
      session_start();
    }
?>
