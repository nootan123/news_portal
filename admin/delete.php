
<?php 

include "connection.php";
include "navbar.php";

?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    <div id = 'delet' class="alert alert-danger" role="alert">
        Category Deleted
    </div>
</body>

</html>

<?php

   
    $id = $_GET['del'];
    $sql = "DELETE FROM category WHERE cat_id = '$id'";
    $result = $conn -> query($sql);
    if ($result){
        
      echo '<script> 
      $(document).ready(function(){
          setTimeout(function(){ 
  
              $("#delet").fadeOut("slow");
  
          }, 3000)
             
         
      });
     window.location.href = "Category.php";
       
        
        </script>';
    }
    else{
        echo  mysqli_error($conn);
    }
  

?>