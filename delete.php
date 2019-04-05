<?php
    require_once("config.php");

    $id = mysqli_real_escape_string($con, $_GET['id']);

    $result = mysqli_query($con, "DELETE FROM bebe  WHERE id=$id");
    
 

?>