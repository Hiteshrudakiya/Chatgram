
<?php 
$con = mysqli_connect("localhost","root","","social_network");
include "a_header.php";
?>

<html>
<head>
	<?php  
		//$user = $_SESSION['user_email'];
		$get_user = "select * from admin";
	 	$run_user = mysqli_query($con,$get_user);
	 	$row = mysqli_fetch_array($run_user);

	 	$first_name = $row['f_name'];
	?>
	<title><?php echo "$first_name"; ?></title>
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
#upload_image_button{
	position: absolute;
	top: 50.5%;
	right: 14%;
	min-width: 100px;
	max-width: 100px;
	border-radius: 4px;
	transform: translate(-50%, -50%);

}

label{
	padding: 7px;
	display: table;
	color: #fff;

}
input[type="file"]{
	display: none;
}
#content{
	width: 70%;

}
#btn-post{
	min-width: 25%;
	max-width: 25%;
}
#insert_post{
	background-color: #fff;
	border:2px solid #e6e6e6;
	padding: 40px 50px;

}
#posts{
	border:5px solid #e6e6e6;
	padding:40px 50px;

}
#posts-img{
	padding-top: 5px;
	padding-right: 10px;
	min-width: 102%;
	max-width: 50%;

}
#single_posts{
	border:5px solid #e6e6e6;
	padding:40px 50px;
}
.pb-cmnt-container{
	font-family: lato;
	margin-top: 100px;

}
.pb-cmnt-textarea{
	resize: none;
	padding: 20px;
	height: 110px;
	width: 100%;
	border: 1px solid #F2F2F2;
}
#find_people{
	border: 5px solid #e6e6e6;
	padding: 40px 50px;

}
#result_posts{
	border: 5px solid #e6e6e6;
	padding: 40px 50px;
}
form.search_form input[type=text]{
	padding: 10px;
	font-size: 17px;
	border-radius: 4px;
	border: 1px solid grey;
	float: left;
	width: 80%;
	background: #f1f1f1;

}
form.search_form button{
	float: left;
	width: 20%;
	padding: 10px;
	font-size: 17px;
	border: 1px solid grey;
	border-left: none;
	cursor: pointer;
}
form.search_form button:hover {
	background: #ob7dda;
}
form.search_form ::after{
	content: "";
	clear: both;
	display: table;
}
</style>
<body>
	
	<div class="row">
		<div class="col-sm-12">
			<center><h2><strong>News Feed</strong></h2><br></center>
			<?php echo get_posts();  ?>
			
		</div>
		
	</div>
</body>
</html>

<?php
function get_posts(){
	global $con;
	

	$get_posts = "select * from posts ORDER by 1 DESC";

	$run_posts = mysqli_query($con,$get_posts);

	while($row_posts = mysqli_fetch_assoc($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'],0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_assoc($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		if($content == "No" && strlen($upload_image) >=1){
			echo "
				<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='../users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='a_user_profile.php?u_id='.$user_id.'>$user_name</a></h3>
							<h4 ><small style='color:black;'>updated a post on <strong>.$post_date.</strong></small></h4>
						</div>
						<div class='col-sm-4'>

						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='../imagepost/$upload_image'style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>

				</div>
				</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo "
				<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='../users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='a_user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 ><small style='color:black;'>updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>

						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='../imagepost/$upload_image'style='height:350px;'>
						</div>
					</div><br>
					
				</div>
				<div class='col-sm-3'>

				</div>
				</div><br><br>
			";

		}
		else
		{
				echo "
				<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='../users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='a_user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4 ><small style='color:black;'>updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>

						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					<a href='a_single.php?post_id=$post_id'style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>

				</div>
				</div><br><br>
			";
		}
	}
}
	?>