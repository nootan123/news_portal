
<?php
include "../config/connection.php";

if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['catName'])){
       
        $category = $_POST['catName'];
        $description = $_POST['catDes'];
        $sql = "INSERT INTO category  VALUES ('', '$category', '$description');";
        if($conn -> query($sql)=== TRUE){
            echo "<br>New record added.";
        }
        else{
            echo "Error: ".$conn->error;
        }
        // echo "category: ".$category."Description: ".$description;
        unset($_POST);
       

        

    }
}
header("Location: addCategory.php");
?>