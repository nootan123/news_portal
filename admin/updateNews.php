<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
    include 'navbar.php';
    include '../config/connection.php';
    
    if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
        if(isset($_POST['neTitle'])){
            

            $title = $_POST['neTitle'];
            $id = $_POST['id'];
            $description = addslashes($_POST['neText']);
            $filename = $_FILES["neImage"]["name"];
            if($filename != "" || $filename != null){
            $tempname = $_FILES["neImage"]["tmp_name"];
            $folder = "image/news/" . $filename;
            $fileExtension = explode('.', $filename);
            $fileActualExtension = strtolower(end($fileExtension));
            $fileNameNew = uniqid('', true).".".$fileActualExtension;
            $fileDestination = "image/news/".$fileNameNew;
            }

            $category = $_POST['neCat'];
            print($folder.'\n');

            print('tempName'.$tempname.'\n\n'. "Folder: ".$fileDestination);
            try{
          if(move_uploaded_file($tempname, $fileDestination)){
           header("Location: index.php");
          }else{
            throw new Exception("Error: File upload failed.");
          }
            }catch(Exception $error){
                echo "Error: " . $error->getMessage();
            }
            echo $title."<br>".$description."<br>".$image."<br>".$category."<br>";
            echo "idd of news: ".$id. " title: ".$title." description: ".$description." news_pic: ".$fileNameNew."Category: ".$category ;
            $sql =($filename != "" || $filename != null)? "UPDATE  addnews SET news_title ='$title',news_text = '$description', news_pic = '$fileNameNew',news_time = current_timestamp(),id = ("."SELECT cat_id FROM category WHERE cat_name = '$category') WHERE news_id = $id":"UPDATE  addnews SET news_title ='$title',news_text = '$description',news_time = current_timestamp(),id = ("."SELECT cat_id FROM category WHERE cat_name = '$category') WHERE news_id = $id";
        //   $sql = "SELECT cat_id FROM category WHERE cat_name = $category ;";
        echo $sql;
        try{
            $result = $conn -> query($sql);
        }catch(Exception $e) {
            echo "message:".$e;

        }
        
            echo $result;
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