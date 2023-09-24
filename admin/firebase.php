  
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>

<script>
 // Your web app's Firebase configuration
 var firebaseConfig = {
    apiKey: "AIzaSyB2h7PXd6LIfBxov6_qBQUPmBnHMrqrvqo",
    authDomain: "login-e245e.firebaseapp.com",
    databaseURL: "https://login-e245e.firebaseio.com",
    projectId: "login-e245e",
    storageBucket: "bucket.appspot.com",
    messagingSenderId: "872907923131",
    appId: "1:872907923131:web:8eac4a09329fd33d09d39e",
    measurementId: "G-78H689Q4ZM"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
//   firebase.analytics();
</script>

<script>

// var user = firebase.auth().currentUser;
    firebase.auth().onAuthStateChanged(function(user) {
                // if (user) {  
              
                //     // alert("welcome: "+user.photoURL);
                // } 
                // // else if(window.location == "http://localhost/news/admin/index.php"){
                // //     // alert(window.location);
                // // }
                // else{
                //     window.location = "index.php";
                   
                // }
                document.getElementsByTagName("img")[0].src = user.photoURL;
    });


    function logout(){
        firebase.auth().signOut();
    }

    // var user = firebase.auth().currentUser;
    // photo = user.photoURL;
   

    
</script>