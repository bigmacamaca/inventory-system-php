<?php 
    $conn = new mysqli("localhost", "root", "", "productinventorystystem"); 

    if($conn){
        // connection established
    }
    else {
        // connection failed
        // die(mysqli_error($conn));
    }
    
?>