<?php

function connection(){

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'dar_db';


    $conn = new mysqli($servername, $username, $password, $dbName);

    if(!$conn){
        die("not connected: " . $conn->connect_error);
    }
    else{
        return $conn;
    }


}

$conn = connection();

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $purpose = $_POST['purpose'];
    $date = $_POST['date'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];

    $sql = "INSERT INTO person (person_id, first_name, last_name, middle_name,purpose, Added_att, TimeIn, TimeOut ) VALUES ('','$firstname','$lastname','$middlename','$purpose', '$date','$timeIn','$timeOut')";

    // $query = $conn->query($sql) or die($conn->error); 

    if($conn->query($sql) === TRUE){
        echo "<script> 
        swal.fire({
          title: 'NEW RECORD UPLOADED',
          text: 'Successfully Added',
          icon: 'success',
          button: 'Okay',
        }).then(function(){
            window.location.href = '/DAR/index.php'
         });    
     </script>";
    //  header('location:http://localhost/DAR/index.php');
    }else{
     echo" 
     <script> 
     swal.fire({
       title: 'ERROR',
       text: 'Adding failed',s
       icon: 'error',
       button: 'Okay',
     }).then(function(){
        window.location.href = '/DAR/index.php'
     });  
     
     </script>";
     
    //  header('location:http://localhost/DAR/index.php');
    }

$conn->close();

}



?>