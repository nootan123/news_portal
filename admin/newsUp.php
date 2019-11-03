<?php

    include 'navbar.php';
    include '../config/connection.php';

    $sql = "select * from category;";
    $result = $conn -> query($sql);
?>


<html>
<head>

</head>
<body>
    <div id = "cont">
    <form action="newsUpPost.php" method = "POST" enctype="multipart/form-data" >
    
    <div class = "form-group" >
            <label for="">category:</label>
            <div style = "width: 260px;">
                <select name = "neCat" class="form-control form-control-lg btn btn-secondary">
                <?php
                if($result -> num_rows > 0){
                    while($row = $result ->fetch_assoc()){
                        
                        
                        ?>
                    <option>
                        <?php
                            echo $row['cat_name'];
                            echo '<br>';

                                }
                            }
                        ?>
                 
                 </option>
            </div>  

                </select>

        </div>
    <div class = "form-group mt-4">
        <label for="">Title</label><br>
        <input type="text" class = "form-control" name = "neTitle">
    </div>
    <div class = "form-group mt-4">
    <label for="">News: </label><br>
    <pre>
    <textarea name="neText" class = "form-control" id="newsdes" cols="80" rows="10"></textarea>
        
    </pre>
    
    </div>
    <div class = "form-group mt-4">
    <label for="">Image File:</label><br>
    <input type="file" name= "neImage" class = "form-control">
    </div>
    <div class = "mt-4">
        <input type="submit" name = "submit" class = "btn btn-primary form-control ">
    </div>
    
    
    </form>
        

    </div>
   

</body>
<style>
    #cont{
        margin-left:8%;
        margin-right: 8%;
        margin-top: 2%;
    }
</style>
</html>
<?php
mysqli_close($conn);
?>