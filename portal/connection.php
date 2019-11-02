<?php

    $conn = new mysqli("localhost", "root","", "news");
    if($conn -> connect_error){
        die("connection failed: ".$conn ->connect_error);

    }
   

?>