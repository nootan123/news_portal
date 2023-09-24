

// $(window).load(function() {
//     // Animate loader off screen
//     $(".sc-pre").fadeOut("slow");
// });

$(document).ready(function(){
  login();
    // $("#sub").click(function(){
    //     $(".spinner").css("display", "block");
    //     $("body").css("opacity", 0.5);
    //     $("#container").css("opacity", 0.6);

    // });
    
   
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {  
         window.location = "index.php";
       
        } else {
         
        }
      });
})


function login(){
    
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    window.location = "index.php";
    
    // firebase.auth().signInWithEmailAndPassword(username, password).catch(function(error) {
    //     // Handle Errors here.
    //     var errorCode = error.code;
    //     var errorMessage = error.message;
        

    //     document.getElementById("pError").innerHTML = errorMessage;
       
    //   });
      
}


function googleLogin(){
    var provider = new firebase.auth.GoogleAuthProvider();

    firebase.auth().signInWithPopup(provider).then(function(result) {
        // This gives you a Google Access Token. You can use it to access the Google API.
        var token = result.credential.accessToken;
        // The signed-in user info.
        var user = result.user;
        // ...
        
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
      });
}

function facebookLogin(){
    var provide = new firebase.auth.FacebookAuthProvider();

    firebase.auth().signInWithPopup(provide).then(function(result) {
        // This gives you a Facebook Access Token. You can use it to access the Facebook API.
        var token = result.credential.accessToken;
        // The signed-in user info.
        var user = result.user;
        // ...
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
      });
}

function twitterLogin(){

  var provider = new firebase.auth.TwitterAuthProvider();

  firebase.auth().signInWithPopup(provider).then(function(result) {
    // This gives you a the Twitter OAuth 1.0 Access Token and Secret.
    // You can use these server side with your app's credentials to access the Twitter API.
    var token = result.credential.accessToken;
    var secret = result.credential.secret;
    // The signed-in user info.
    var user = result.user;
    // ...
  }).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
  });
}
