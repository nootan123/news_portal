<?php

include '../config/connection.php';
include 'navbar.php';

$id = $_GET['news'];
// echo $id;

function compareByTimeStamp($time1, $time2) 
{ 
    if ($time1 > $time2) 
        return -1; 
    else if ($time1 < $time2) 
        return 1; 
    else
        return 0; 
} 
function wordCount($abc){
    $word1 = strpos($abc, ".");
    $word2 = strpos($abc, ".", $word1+1);
    $str = substr($abc, 0, $word2+1);
    return $str;

}
$sql = "SELECT * FROM addnews WHERE id = '$id'";
$result = $conn -> query($sql);
$arr = array();
if($result -> num_rows >0){
    while($row = $result -> fetch_assoc()){
       array_push($arr,  $row['news_id']);
        // echo $arr.'<br>';
        
    }
}
usort($arr, "compareByTimeStamp"); 





?>


<body class = "pt-5" style = "background-color: #F2F3F5;">
    


<div class = "container-fluid" style = "background-color: #F2F3F5; ">
    <div class = "row">

    <div class = "col-md-2 pt-3 " >
        <?php 
    $sql = "SELECT cat_name FROM category WHERE cat_id = '$id'";
$result = $conn -> query($sql);
if($result -> num_rows > 0){
  while($row = $result -> fetch_assoc()){
   $name = $row['cat_name'];

}}
?>     

<div class="dropright" style = "margin-left: 70%; padding-top: -50% " >
  <div  class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?php echo $name.""; ?>
</div>
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
                                  $wo = wordCount(nl2br($row['news_text']));
                                  $pic =  $row['news_pic'];
                                  ?>
                <div class = "border border-secondary rounded mt-2" style = " border-width:1px !important;">
                   
                        <div clas= "">
                        
                                                        
                                
                                    <a href="oneNews.php?news=  <?php echo $row['news_id']; ?>" > <h1><?php echo htmlspecialchars(nl2br($row['news_title'])); ?></h1></a>
                                    
                                

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













<div class = "col-md-3 overflow-auto  sticky-top fixed-top pt-5" id = "nos" data-spy="scroll" style = "height: 100vh; ">
  



<?php
$sql = "SELECT * FROM addnews WHERE id = 52";
$result = $conn -> query($sql);
if($result -> num_rows > 0){
  while($row = $result -> fetch_assoc()){
    $wo = wordCount(nl2br($row['news_text']));       
       $pic =  $row['news_pic'];
    //    echo $pic;
        ?>
<div class = "border rounded bg-warning " style = "margin-left: -4.8%; margin-right: -4%; background-color: white; ">
   <div style = "padding-left: 15px; padding-right: 15px;">
       <div >
            <a href="oneNews.php?news = <?php echo $row['news_id']; ?>"><center><h4><?php echo nl2br($row['news_title']); ?></h4></center></a>
            
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