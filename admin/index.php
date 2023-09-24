<?php include 'firebase.php'; ?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/login.css">
<script src = "js/login.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
   <div class ="spinner" style ="display: none">
       <img src="image/sp.gif" alt="spinner">
   </div>
  
    <div id = "container" class = "container" >
           
    
            <h2 style = "padding-left: 2%;" id="#hea">Sign In</h2>
            <div style = " padding-top: 20%;" id = "nootan">
                <form action="index.php" method = "POST">
                    <div class = "form-group">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style = "background-color:rgb(0, 170,0);">
                                        <i class="fas fa-user" style= "color: black;"  ></i>
                                    </div>
                                </div>
                                <input type="text" placeholder="username" class = "form-control" id = "username">
                            </div><br>
                                
                                <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style = "background-color:rgb(0, 170,0);">
                                                <i class="fas fa-key" style= "color: black" ></i>
                                            </div>
                                        </div>
                                    <input type="password" placeholder = "password" class = "form-control" id = "password">
                                   
                                </div>
                               <p id = "pError"></p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1" id = "rem">
                                        Remember Me
                                    </label>
                                    </div>
                            <div >
                                <input type="button" class = "btn  btn-success float-right " id = "sub" value = "Log In" onclick = "login()"> 
                            </div><br><br>

                     </div>
        
            
                </form>
                <div >
                    <center>
                        Don't have an account?<a href="signup"  id = "signUp">&nbsp;Sign Up</a><br>
                    <a href ="#">Forget your password?</a>
                    </center>
                   
                </div>
            
           
        </div>
       
    </div>

   






    
</body>


</html>