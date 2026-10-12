<!DOCTYPE html>
<?php 
#session_start();
include "../includes/connection.php";
include "a_header.php";

?>
<html>
<head>
	
	<title>Find People</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style/home_style2.css">
</head>
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<center><h2>Find New People</h2></center><br><br>
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<form class="search_form" action="">
						<input type="text" placeholder="Search Friend" name="search_user">
						<button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
					</form>
				</div>
				<div class="col-sm-4">
				</div>
			</div><br><br>
			<?php search_user(); ?>
			
		</div>
	</div>
</body>
</html>
<?php
function search_user(){
		global $con;

		if(isset($_GET['search_user_btn'])){
			$search_query = htmlentities($_GET['search_user']);
			$get_user = "select * from users where f_name like '%$search_query%' OR l_name like '%$search_query%' OR user_name like '%$search_query%'";
		}
		else{
			$get_user = "select * from users";
		}
		$run_user = mysqli_query($con, $get_user);

		while($row_user = mysqli_fetch_array($run_user)){
			$user_id = $row_user['user_id'];
			$f_name = $row_user['f_name'];
			$username = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			echo "
				<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div class='col-sm-6'>
					<div class='row' id='find_people'>
						<div class='col-sm-4'>
						<a href='a_user_profile.php?u_id=$user_id'>
						<img src='../users/$user_image' width='150px' height='140px' title='$username' style='float:left; ,margin:1px;'/>
						</a>
						</div><br><br>
						<div class='col-sm-6'>
						<a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='a_user_profile.php?u_id=$user_id'>
						<strong><h2>$f_name</h2></strong>
						</a>
						<a href='a_delete_user.php?user_id=$user_id'style='float:right;'><button class='btn btn-danger'>Delete</button></a>
						</div>
						<div class='col-sm-3'>
						</div>
					</div>
				</div>
				<div class='col-sm-4'>
				</div>
				</div><br><br>
			";
		}
	}
?>
