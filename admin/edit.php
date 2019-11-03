<?php
    include 'navbar.php';
    include '../config/connection.php';

?>


<?php
error_reporting(0);
$id = $_GET['edit'];
$sql = "SELECT * FROM category WHERE cat_id = '$id'";
$result = $conn -> query($sql);

if ($result -> num_rows > 0){
    while($row =  $result -> fetch_assoc()){
        $category = $row["cat_name"];
        $description = $row["cat_desc"];

    }}
   
?>   


<html>
<head>

 
</head>
    
<body>
    <div style = "margin-left: 10%; margin-right: 10%; margin-top: 5%;">
    <h1>Update Category</h1>
    <form method = "POST" id="myForm" action = "Edit.php">
        <div class = "form-group">
            <label for="InputCategory">Category Name: </label>
            <input type="text" class = "form-control" name = "catName" id= "InputCategory" value = "<?php echo $category; ?>" placeholder = "Category Name" >
            <p id = "catErr" style = "color:red;"></p>
        </div>
        <div class ="form-group">
            <label for="">Description</label>
            <textarea  class = "form-control" name = "catDes" id = "abcNootan"  rows = "5"><?php echo $description; ?></textarea>
            <p id = "descErr" style = "color: red;"></p>
        </div>
       
        <div class = "form-group">
            <input type="hidden" name = "id" value = "<?php echo $_GET['edit']; ?>">
            <button class = "btn btn-info" id ="submita"  >Edit</button>
        </div>
 
    </form>
 
    </div>
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
        //  alert("submit");
        abc();
        

     }
 
 });
 function abc(){
    document.getElementById("myForm").submit();

 }


</script> 
</body>

<?php

if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['catName'])){
        $id = $_POST['id'];
        $category = $_POST['catName'];
        $description = $_POST['catDes'];
        // UPDATE `category` SET `cat_desc` = 'This is the description of politics. ' WHERE `category`.`cat_id` = 1;
        $sql = "UPDATE category SET cat_name = '$category', cat_desc = '$description' WHERE cat_id = '$id' ";
       
        if($conn -> query($sql)=== TRUE){
            // echo "hello";
            echo"<script>window.location = 'Category.php';</script>";
            // header("Location: Category.php");
        }
        else{
            echo "Error: Category not Updated";
        }
        // echo "category: ".$category."Description: ".$description;
        unset($_POST);
       

        

    }
}

?>

<!-- echo "catID: ".$id;
echo $category;

?> -->