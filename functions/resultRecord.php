<?php

    include_once('connection/Dbconnection.php');

    // $conn = connection();

    $Sqlquery = "SELECT * FROM person";
    $result = $conn->query($Sqlquery) or die($conn->error);




?>