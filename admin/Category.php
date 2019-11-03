<?php 

    include "navbar.php";
    include "../config/connection.php";
    
    $sql = "select * from category;";
    $result = $conn -> query($sql);

?>
<html>
<head>


</head>
<body>
    
    


    <div id = "caTable">

    <div class = "pt-5 text-right" id = "adCat">
    <a href = "addCategory.php" class = "btn btn-success btn-sm " >Add Category</a>

    </div>
    <div style = "margin-top: 2%;">

    <table class = "table table-stripped" style = "text-align: center;">
        <thead><tr><th scope = "col" style = "width: 5%; ">id</th><th scope = "col" style = "width: 15%;">Category Name</th><th scope = "col" style = "width: 40%;">Description</th><th style = "width: 15%;">Edit</th><th style = "width: 15%;">Delete</th></tr></thead>
        <tbody>
        <?php 
                if ($result -> num_rows > 0){
                    while($row =  $result -> fetch_assoc()){
            ?>    
        <tr>
                        
            <td><?php echo $row["cat_id"]; ?></td>
            <td><?php echo $row["cat_name"]; ?></td>
            <td><?php echo $row["cat_desc"]; ?></td>
            <td><a href="edit.php?edit= <?php echo $row['cat_id']; ?>" class = "btn btn-info">Edit</a></td>
            <td><a href="delete.php?del= <?php echo  $row['cat_id']; ?>" class = "btn btn-danger" id = "delet1">Delete</a></td>
                <?php
                    }
                }
            ?>
            
        </tr></tbody>
    </table>

    </div>
    


    </div>
    
</body>
<style>

     
    #caTable{
        margin-left: 8%;
        margin-right: 8%;
        margin-top: 2%;
    }

</style>
<script>
 
</script>
</html>
