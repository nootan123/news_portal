<?php

    include_once "config.php";

    $conn = new mysqli(HOST, USER_NAME,PASSWORD, DB_NAME, 3309);
    if($conn -> connect_error){
        die("connection failed: ".$conn ->connect_error);
    }

?>