<?php
include("../includes/connection.php");


?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false"></button>
			<span class="sr-only"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<a href="A_home.php" class="navbar-brand">Chatgram</a>
		</div>
		<div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
					//session_start();

				 	//$user = $_SESSION['user_email'];
				 	$get_user = "select * from users";
				 	$run_user = mysqli_query($con,$get_user);
				 	$row = mysqli_fetch_array($run_user);

				 	$user_id = $row['user_id'];
				 	$user_name = $row['user_name'];
				 	$first_name = $row['f_name'];
				 	$last_name = $row['l_name'];
				 	$describe_user = $row['describe_user'];
				 	$Relationship_status = $row['Relationship'];
				 	$user_pass = $row['user_pass'];
				 	$user_email = $row['user_email'];
				 	$user_gender = $row['user_gender'];
				 	$user_birthday = $row['user_birthday'];
				 	$user_image = $row['user_image'];
				 	$user_cover = $row['user_cover'];
				 	$recovery_account = $row['recovery_account'];
				 	$register_date = $row['user_reg_date'];

				 	$user_posts = "select * from posts where user_id='$user_id'";
				 	$run_posts = mysqli_query($con,$user_posts);
				 	$posts = mysqli_num_rows($run_posts); 
				 ?>
				 	<li>
				 		<!-- <a href='a_profile.php?<?php echo "u_id=$user_id" ?>'><?php echo "$first_name"; ?></a> -->
				 	</li>
				 	<li><a href='a_home.php'>Home</a></li>
				 	<li><a href='a_member.php'>Find People</a></li>
				 	<li><a href='a_Messages.php?u_id=new'>Messages</a></li>
				 	<?php
				 		echo "
				 		<li class='dropdown'>
				 			
				 				<li role='separator' class='divider'></li>
				 				<li>
				 					<a href='a_logout.php'>Logout</a>
				 				</li>
				 			
				 		</li>
				 			";
				 	?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-from navbar-left" method="get" action="a_result.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="search">
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>				
				</li>
				
			</ul>
		</div>
	</div>
	
</nav>