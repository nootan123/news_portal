<?php 
    include 'navbar.php';
    include '../config/connection.php';
    
    if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
        if(isset($_POST['neTitle'])){
            

            $title = $_POST['neTitle'];
            $description = addslashes($_POST['neText']);
            $image = $_FILES['neImage']['name'];
            $tmp_image = $_FILES['neImage']['tmp_name'];

            $category = $_POST['neCat'];
           move_uploaded_file($tmp_image,"image/news/$image" );

            echo $title."<br>".$description."<br>".$image."<br>".$category."<br>";

            $sql = "INSERT INTO addnews(news_id, news_title, news_text, news_pic, news_time, id) VALUES('', '$title', '$description', '$image',current_timestamp(), ("."SELECT cat_id FROM category WHERE cat_name = '$category') )";
        //   $sql = "SELECT cat_id FROM category WHERE cat_name = $category ;";
            $result = $conn -> query($sql);
            echo "<script> alert($result)</script>";
            if($result == TRUE){
                echo "record added successfully";
            }
            else{
                echo "couldnot create record ".$conn -> error;
            }


        }
    }
//    echo "<script>window.location = 'newsUP.php'</script>";
//    mysqli_close($conn);
?>