<?php  

    include 'navbar.php';
    include '../config/connection.php';

    $sql = "SELECT * FROM addnews ORDER BY news_id DESC";
    $result = $conn -> query($sql);
    $arr = array();
    if($result -> num_rows >0){
        while($row = $result -> fetch_assoc()){
           array_push($arr,  $row['news_id']);
            // echo $arr.'<br>';
            
        }
    }
  
?>

<html>
<head>
</head>
<body style = "padding-top: 60px;">
 

    <div class = "container-fluid" >
        <div class = "row" >
        <div class = "col-md-2 overflow-auto  sticky-top  pt-5" id = "nos" data-spy="scroll" style = "height: 100vh; ">

                <div style = "">
                   <center style = "font-family: arial;">Trending</center> 
                    <?php
                    
                    $sql = "SELECT * FROM  addnews ORDER BY views DESC ";
                    $result = $conn -> query($sql);
                    
                    if($result -> num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            $wo = substr(nl2br($row['news_text']),0,200);
                            $pic =  $row['news_pic'];
                            ?>

                                <div class = "bg-success rounded ">  
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                            <div class="p-2 bd-highlight">
                                            <a href="oneNews.php?news=  <?php echo $row['news_id']; ?>" style = "font-family: Helvetica, Arial, sans-serif;"> <h5 style = "color: white;"><?php echo htmlspecialchars(nl2br($row['news_title'])); ?></h5></a>
                                            <img src="../admin/image/news/<?php echo $pic ?>" alt="" style = "height: auto; width: 50%; " >

                                    </div>

                                            
                                        </div>


                                </div>
                                


                      <?php      
                        }
                    }
                    ?>
                </div>
            </div>
            <div class = "col-md-7 pt-5 " style = "">
            <?php
                    
                        foreach($arr as $value){
                        //   echo $value.'<br>';
                          $sql = "SELECT news_id, news_title, news_pic, news_text FROM addnews WHERE news_id = '$value'";
                          $result = $conn -> query($sql);
                          if($result -> num_rows > 0){
                              while($row = $result -> fetch_assoc()){
                                  $wo = substr(nl2br($row['news_text']),0,250);
                                  $wo.=" ...";
                                  $pic =  $row['news_pic'];
                                  ?>
                <div class = "border border-secondary rounded mt-2" style = " border-width:1px !important;">
                   
                        <div clas= "">
                        
                                                        
                                <div>
                                    <a href="oneNews.php?news=  <?php echo $row['news_id']; ?>" style = "font-family: Helvetica, Arial, sans-serif;"> <h1><?php echo htmlspecialchars(nl2br($row['news_title'])); ?></h1></a>
                                </div>

                                <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">
                                        <img src="../admin/image/news/<?php echo $pic ?>" alt="" style = "height: 200px; width: 100%; " >
                                    </div>

                                    <div class="p-2 bd-highlight">
                                    
                                        <?php echo $wo;
                                            echo "<br>"."<br>"."<br>";
                                        ?>
                                    </div>
                                </div>
                                
                                
                            
                        </div>
                       
                       
                    
                </div>
                <?php
                                //   echo $row['news_title']."<br>". $row['news_pic']."<br>".$wo."<br>"."<br>"."<br>"."<br>";
                              }
                          }
                            } ?>
            </div>



            <div class = "col-md-3 overflow-auto  sticky-top  pt-5" id = "nos" data-spy="scroll" style = "height: 100vh; ">

                <?php
                $sql = "SELECT * FROM addnews WHERE id = 52";
                $result = $conn -> query($sql);
                if($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    $wo = wordCount(nl2br($row['news_text']));
                    $pic =  $row['news_pic'];
                    //    echo $pic;
                        ?>
                <div class = "border rounded bg-warning" style = "margin-left: -4.8%; margin-right: -4%; background-color: white; ">
                    <div style = "padding-left: 15px; padding-right: 15px;">
                            <div > 
                                   <a href="oneNews.php?news= <?php echo $row['news_id']; ?>">  <center><h4><?php echo nl2br($row['news_title']); ?></h4></center> </a>
                               
                            </div>
                            
                            <div style = "margin-left: 15%;">
                                <img src="../admin/image/news/<?php echo $pic ?>" alt="" style = "height: auto; width: 50%; " >
                            
                            </div>
                            <div class = "mt-3">
                            
                                <?php echo $wo;
                                echo "<br>"."<br>"."<br>";
                                ?>
                            </div>
                    </div>
                 </div><br>
    
            <?php
            }}
            ?>
        </div>
        </div>
    
    </div>
</body>
<style>
      
   #nos::-webkit-scrollbar {
  width: 10px;
}
 #nos::-webkit-scrollbar-thumb  {
  background: grey; 
  border-radius: 5px;
}

a:hover{
    text-decoration: none;
}

a:visited {
    color: hotpink;
}
  </style>
</html>