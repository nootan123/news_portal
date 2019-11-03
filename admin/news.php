<?php 
     include 'navbar.php';
     include '../config/connection.php';

    $sql = "SELECT * FROM addnews ORDER BY id";
    $result  = $conn -> query($sql);





?>

<div class = "container-fluid">
    <div class = "row">
        <div class = "col-md-3">
            
        </div>
        
        <div class = "col-md-6">
        <div class = "table-responsive">
        
            <table class = "table">
                <thead>
                    <tr>
                        <th scope = "col" style = "width: 5%;">News ID</th>
                        <th scope = "col" style = "width: 60%;" >Title</th>
                        <th scope = "col" style = "width: 20%;">Picture</th>
                        <th scope = "col" style = "width: 5%;">Views </th>
                        <th scope = "col" style = "width: 5%;">Edit</th>
                        <th scope = "col" style = "width: 5%;">Delete</th>

                     </tr>
                    

                </thead>
                <tbody>
                <?php
                    if($result -> num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            $news_id = $row['news_id'];
                            $title = $row['news_title'];
                            $text = $row['news_text'];
                            $pic = $row['news_pic'];
                            $time = $row['news_time'];
                            $id = $row['id'];
                            $views = $row['views'];
                            

                ?>
                    <tr>
                        <td><?php echo $news_id; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $pic; ?></td>
                        <td><?php echo $views; ?></td>
                        <td><a href="editNews.php?edit= <?php echo $row['news_id']; ?>" class = "btn btn-success">Edit</a></td>
                        <td><a href="delNews.php?delete= <?php echo $news_id; ?>" class = "btn btn-danger">Delete</a></td>



                        
                    </tr>
                        <?php
                                

                                // echo $news_id." ".$title."<br>";
                            }
                        }

                    ?>
                </tbody>
            </table>
        </div>
        </div>

        <div class = "col-md-3">

        </div>
        
    </div>
    
</div>