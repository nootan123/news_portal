<?php
    include 'navbar.php';
    include '../config/connection.php';



if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
    echo "inside Post";
    if(isset($_POST['catName'])){
        
        $category = $_POST['catName'];
        $description = $_POST['catDes'];
        echo "$category $description";
        $sql = "INSERT INTO category (cat_name, cat_desc)  VALUES ('$category', '$description');";
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
header("Location: Category.php");
?>

<html>
<head>


 
</head>
    
<body>
    <div style = "margin-left: 10%; margin-right: 10%; margin-top: 5%;">
    <h1>Add Category</h1>
    <form method = "POST" id="myForm" action = "addCatPost.php">
        <div class = "form-group">
            <label for="InputCategory">Category Name: </label>
            <input type="text" class = "form-control" name = "catName" id= "InputCategory" placeholder = "Category Name" >
            <p id = "catErr" style = "color:red;"></p>
        </div>
        <div class ="form-group">
            <label for="">Description</label>
            <textarea  class = "form-control" name = "catDes" id = "abcNootan" rows = "5"></textarea>
            <p id = "descErr" style = "color: red;"></p>
        </div>
       
        <div class = "form-group">
            <button class = "btn btn-info" id ="submita"  >Submittt</button>
        </div>
 
    </form>
 
    </div>
 
</body>
 
<script>
 
 
 
 document.getElementById("submita").addEventListener("click",function(event){
     event.preventDefault();
     $("#catErr").text("");
     $("#descErr").text("");
     $des = $cat = "";
     $cat = $("#InputCategory").val();
     $des= $("#abcNootan").val();
     // alert("description: ".$cat);
   
 
     if($cat.trim()=="" || $des.trim()==""){
       
         if($des.trim() == ""){
             $("form #descErr").text("Description is required.");
         }
 
 
         if($cat.trim()==""){
         $("form #catErr").text("Category Name is required.");
         }
       
     }
    //  var database = firebase.database();
     if($cat.trim()!="" && $des.trim()!="") {
        
        
        abc();
        

     }
 
 });
 function abc(){
    document.getElementById("myForm").submit();

 }
</script>

