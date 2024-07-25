<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<HTML>
<HEAD>
<TITLE>Login</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	body {
		background-image: url("./assets/Dict.png");
		background-position: center; /* Center the image */
		background-repeat: no-repeat; /* Do not repeat the image */
		background-size: cover; /* Resize the background image to cover the entire container */
	}

	.sign-up-container {
		border: 1px solid;
		border-color: #9a9a9a;
		background-color: #00000033;
		border-radius: 4px;
		padding: 10px;
		width: 25%;
		margin: 20px auto;
		float: left; /* Align the container to the left */
	}

	.page-header {
		float: right;
	}

	.login-signup {
		margin: 10px;
		text-decoration: none;
		float: right;
	}

	.login-signup a {
		text-decoration: none;
		font-weight: 700;
	}

	.signup-heading {
		font-size: 2em;
		font-weight: bold;
		padding-top: 60px;
		text-align: center;
	}

	.inline-block {
		display: inline-block;
	}

	.row {
		margin: 15px 0px;
		text-align: center;
	}

	.form-label {
		margin-bottom: 5px;
		text-align: left;
	}

	input.input-box-330 {
		width: 250px;
		color: black;
	}

	.sign-up-container .error {
		color: #ee0000;
		padding: 0px;
		background: none;
		border: #ee0000;
	}

	.sign-up-container .error-field {
		border: 1px solid #d96557;
	}

	.sign-up-container .error:before {
		content: '*';
		padding: 0 3px;
		color: #D8000C;
	}

	.error-msg {
		padding-top: 10px;
		color: #D8000C;
		text-align: center;
	}

	.success-msg {
		padding-top: 10px;
		color: #176701;
		text-align: center;
	}

	input.btn {
		width: 250px;
	}

	.signup-align {
		margin: 0 auto;
	}

	.page-content {
		font-weight: bold;
		padding-top: 60px;
		text-align: center;
	}

	header{
		background-color: #00000033;
		font-size: 24px;
		height: 50px;
		z-index: 10;
	}
	

</style>
</HEAD>
<BODY>
	
		
			
	<header>
        <div class="logo"><img src="logo.png" alt="" width="150p" height="45p"></div>
    </header>	
	<div class="phppot-container">
	
		<div class="sign-up-container">
			
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading"  style="color:white;">Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							
							<input class="input-box-330" type="text" name="username"
								placeholder="name" id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							
							<input class="input-box-330" type="password"
								name="login-password" id="login-password" placeholder="password">
						</div>
					</div>
					<div class="row">
						<input class="btn btn-dark" type="submit" name="login-btn"
							id="login-btn" value="Login Now"> 
							<br><br>
							<div style="color:white;">
								Don't have an account ? <a class="" href="user-registration.php" style="color:#ffc72c;">sign up</a> 
							</div>
							<br>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>