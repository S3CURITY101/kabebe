<?php
    $con = new mysqli ("localhost", "mysqlusername", "mysqlpassword", "bebeko");

    if($con->connect_error){
      die ("Could not connect to the Database!".$con->connect_error);
    }

?>
