<?php
    $conn =new mysqli('localhost', 'root','', 'cucei');
    $conn->query("SET NAME 'utf8");
    if($conn->connect_error){
        echo $error -> $conn->connect_error;
    }
    
    ?>



<!-- $servername = "localhost";
$username = "id16198272_root";
$password = "rFVW?(_x9d4Df%\B";
$database = "id16198272_cucei";

    $conn =new mysqli($servername, $username,$password, $database);
        $conn->query("SET NAME 'utf8");
 // Check connection
  if($conn->connect_error){
        echo $error -> $conn->connect_error;
    }
    
echo "Connected successfully"; -->
    
    