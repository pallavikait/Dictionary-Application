<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>


.form-label{
color:white !important;
}
#login-btn{
	color:white;
	font-weight:bold;
	background: #343a40;
}
.sign-up-container{
  background-color: transparent;
}
</style>
</HEAD>
<BODY>
<video src="./background.mp4" autoplay muted loop></video>
    <!-- <img src="./assets/bg.jpg" alt=""> -->
	<div class="phppot-container" >
      
		<div class="sign-up-container" >
            <h1 style="color:white;text-align:center;font-size:40px">
                Welcome to your Account 
                <p style="font-weight:bold;text-transform:uppercase;color:tomato "><?php echo $username;?></p>
            </h1>
            <a class=" btn btn-warning" style="margin-left:100px" href="logout.php" style="color:white">Logout</a>
        </div>
            
	</div>
    
</BODY>
</HTML>
