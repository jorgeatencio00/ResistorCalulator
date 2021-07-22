<?php
include("dbConnect.php");
 session_destroy();
 header("Location: login.php?logout=success");
 ?>
