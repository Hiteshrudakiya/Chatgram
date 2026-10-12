<!DOCTYPE html>
<html>
<head>
	<title> Chatgram Login and signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		overflow-x: hidden;
	}
	#centered1{
		position: absolute;
		font-size: 10vw;
		top: 30%;
		left: 30%;
		transform: translate(-50%,-50%);
	}
	#centered2{
		position: absolute;
		font-size: 10vw;
		top: 50%;
		left: 40%;
		transform: translate(-50%,-50%);
	}
	#centered3{
		position: absolute;
		font-size: 10vw;
		top: 70%;
		left: 30%;
		transform: translate(-50%,-50%);
	}
	#signup{
		width: 60%;
		border-radius: 30px;
		height: 60px;
	}
	#login{
		width: 60%;
		background-color: #fff;
		color: #1da1f2;
		border:1px solid #1da1f2;
		border-radius: 30px;
		height: 60px;
	}
	#login:hover{
		width: 60%;
		background-color: #fff;
		color: #1da1f2;
		border:2px solid #1da1f2;
		border-radius: 30px;
	}
	.well{
		background-color: #187FAB;
	}
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<center><h1 style="color: white;">Chatgram</h1></center>
			</div>
		</div>
	</div>
	<div class="row ">
		
		<div class="col-sm-10" align="center">
			
			<div class="col-sm-14"></div>
			<form method="post" action="" class="main-content">
				<button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
				<?php  
					if(isset($_POST['signup'])){
						echo "<script>window.open('a_signup.php','_self')</script>";
					}
				 ?>
				<button id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>
				<?php  
					if(isset($_POST['login'])){
						echo "<script>window.open('a_signin.php','_self')</script>";
					}
				 ?>
			</form>
		</div>
	</div>
</body>
</html>