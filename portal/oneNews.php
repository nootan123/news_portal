<?php
    include '../config/connection.php';
    include 'navbar.php';
    
    // echo $id;
    $id = $_GET['news'];
    $sql = "UPDATE addnews SET views = views + 1 WHERE news_id = '$id'";
    $result =  $conn -> query($sql);
    $_GET = array();

    
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
?>



<div class = "container-fluid" style = "background-color: #F2F3F5; padding-top: 5%;">
    <div class = "row">

    <div class = "col-md-2 " >
        <?php 
    
    $sql = " SELECT  cat_name FROM category,addnews WHERE cat_id = (SELECT id FROM addnews WHERE news_id  = $id )";
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

<div class = "col-md-7 " style = "background-color: white margin-top: 5%;" >
<?php
$sql = "SELECT * FROM addnews WHERE news_id = '$id'";
$result = $conn -> query($sql);

if($result -> num_rows > 0){
   
  while($row = $result -> fetch_assoc()){
       
       $pic =  $row['news_pic'];
    //    echo $pic;
        ?>
<div style = ""  >
   
        <div>
            <center><h1><?php echo htmlspecialchars(nl2br($row['news_title'])); ?></h1></center>
        </div>
        <div>
            <p><?php echo $row['news_time']; ?></p>
        </div>
        <div style = "margin-left: 15%;">
            <img src="../admin/image/news/<?php echo $pic ?>" alt="" style = "height: auto; width: 50%; " >
           
        </div>
        <div class = "mt-3">
        
            <?php echo nl2br($row['news_text']);
            echo "<br>"."<br>"."<br>";
            ?>
        </div>
    </div>
    <?php
    }}
    ?>
</div>













<div class = "col-md-3 overflow-auto card sticky-top fixed-top " id = "nos" data-spy="scroll" style = "height: 100vh; ">
  



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
            <a href="oneNews.php?news = <?php echo $row['news_id'] ?>"><center><h4><?php echo nl2br($row['news_title']); ?></h4></center></a>  
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

<style>
      
   #nos::-webkit-scrollbar {
  width: 10px;
}
 #nos::-webkit-scrollbar-thumb  {
  background: grey; 
  border-radius: 5px;
}
  </style>