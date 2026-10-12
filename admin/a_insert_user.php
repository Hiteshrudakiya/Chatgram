<?php
	$con = mysqli_connect("localhost","root","","social_network");

	if(isset($_POST['sign_up'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
		
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
		
		
		

		if(strlen($pass) <9){
			echo "<script>alert('password should be minimum 9 characters! ')</script>";
			exit();
		}

		$check_email = "select * from admin where user_email='$email'";
		$run_email = mysqli_query($con,$check_email);
		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('email already exist , please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		$rand = rand(1, 3);

			if($rand == 1)
				$profile_pic = "user_4.png";
			else if($rand == 2)
				$profile_pic = "user_5.png";
			else if($rand == 3)
				$profile_pic = "user_5.png";

		$insert = "insert into admin (f_name,user_pass,user_email,user_gender,user_image,user_cover)values('$first_name','$pass','$email','$gender','$profile_pic','cover4.jpg')";
		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('well done $first_name, you are good to go.')</script>";
			echo "<script>window.open('a_signin.php', '_self')</script>";
		}
		else{
			echo "<script>alert('registration failed , please try again!')</script>";
			echo "<script>window.open('a_signup.php', '_self')</script>";
		}

	}
?>