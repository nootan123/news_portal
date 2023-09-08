<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
    include 'navbar.php';
    include '../config/connection.php';
    
    $id = $_GET['edit'];
    echo $id;
    $sql = "select * from addnews where news_id = '$id';";
    $result = $conn -> query($sql);
?>


<html>
<head>

</head>
<body>
    <div id = "cont">
    <form action="updateNews.php" method = "POST" enctype="multipart/form-data" >
    
    <label for="id" hidden><?php echo $id ?></label>
            <label for="">category:</label>
            <div style = "width: 260px;">
                <select name = "neCat" class="form-control form-control-lg btn btn-secondary">
                <?php
                if($result -> num_rows > 0){
                    while($row = $result ->fetch_assoc()){
                        $title = $row['news_title'];
                        $news = $row['news_text'];
                        $pic = $row['news_pic'];
                        $catId = $row['id'];
                        $id;
                        ?>
                        <option>

                            <?php

                                $sq = "SELECT DISTINCT cat_id, cat_name
                                FROM category
                                INNER JOIN addnews ON addnews.id = category.cat_id
                                WHERE addnews.id = "."'".$row['id']."'".";";
                        

                                    $resul = $conn -> query($sq);
                                        if($resul -> num_rows > 0){
                                            while($ro = $resul ->fetch_assoc()){
                                                $cat = $ro['cat_name'];
                                                echo $ro['cat_name'];
                                               
                                                // SELECT cat_name FROM category where cat_name != "Politics"
                                                $sq = "SELECT cat_name FROM category wHERE cat_name != '$cat'";
                                                $resul = $conn -> query($sq);
                                                    if($resul -> num_rows > 0){
                                                        while($ro = $resul -> fetch_assoc()){
                                                            ?>
                                                            <option>
                                                                <?php
                                                                    echo $ro['cat_name'];
                                                                ?>
                                                            </option>

                                                       <?php      
                                                        }
                                                    }  
                                                     
                                            }
                                        }
                     ?>
                   
            </option>
              <?php     
              echo "<br>";
                    }
                }

                 ?>
            </div>  

                </select>

        </div>
        
    <div class = "form-group mt-4">
        <label for="">Title</label><br>
        <input type="text" class = "form-control" name = "neTitle" value = "<?php echo $title; ?>">
    </div>
    <div class = "form-group mt-4">
    <label for="">News: </label><br>
    <pre>
    <textarea name="neText" class = "form-control" id="newsdes" cols="80" rows="10"><?php echo $news; ?></textarea>
        
    </pre>
    </div>
    <div class = "form-group mt-4">
        <input type="hidden" name = "id", value = "<?php echo $id ?>" >
    <label for="">Image File:</label><br>
    <img src=<?php echo "image/news/".$pic; ?> height="70" width = "70">
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