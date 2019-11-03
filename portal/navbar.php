<?php
  include '../config/connection.php';
  $sql = "SELECT * FROM category;";
  $result = $conn -> query($sql);
?>
<html>
<head>
<link rel="icon" href = "https://image.flaticon.com/icons/png/512/14/14711.png">
<title>NB NEWS</title>
</head>
</html>

    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            


<div>

<nav class="navbar fixed-top navbar-expand-sm  navbar-dark bg-primary pt-0 pb-0">
  <a class="navbar-brand" href="index.php">NB NEWS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php
        if($result -> num_rows > 0){
          while($row = $result -> fetch_assoc()){
      ?>
      
      <li class="nav-item active ml-3 ">
        <a class="nav-link" href='newsFeed.php?news= <?php echo $row['cat_id'];?>' >
       <?php
       
       echo $row['cat_name'];
?>

         <span class="sr-only">(current)</span></a>
      </li>
      <?php
          }
        }
        ?>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <div style =" margin: 0%" >
    
    <li class="nav-item dropdown nav-link ml-auto pl-3 mr-5 ml-0 pr-0" >
          
            
            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <img src="" alt="" class = "avatar " > 
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="#">Action</a>
          <a class="dropdown-item " href="#" onclick = "logout()" > Logout</button></a>
          
        </div>
      </li>
    </div> -->
    
    </div>
  </div>
</nav>



</div>
<style>
.avatar{
    vertical-align:middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    
}
</style>