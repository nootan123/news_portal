
<?php
include "../config/connection.php";

if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['catName'])){
       
        $category = $_POST['catName'];
        $description = $_POST['catDes'];
        $sql = "INSERT INTO category (cat_name, cat_desc)  VALUES ('$category', '$description');";
        print("before if");
        if($conn -> query($sql)=== TRUE){
            echo "<br>New record added.";
        print("query run successfully");

        }
        else{
            echo "Error: ".$conn->error;
        print("cannot run query");

        }
        // echo "category: ".$category."Description: ".$description;
        unset($_POST);
       

        

    }
}
header("Location: addCategory.php");
?>