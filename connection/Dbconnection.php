<?php 



        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbName = 'dar_db';


        $conn = new mysqli($servername, $username, $password, $dbName);

        if(!$conn){
            die("not connected: " . $conn->connect_error);
        }
      



?>