<?php
   session_start();
   $conn = mysqli_connect('localhost', 'root', 'nayana@6994', 'details');

    echo "<script>window.open('login.php', '_self');</script>";

   session_destroy();
  
?>