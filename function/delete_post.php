<?php 
$con = mysqli_connect("localhost","root","","social_network") or die("connection was not established");

if(isset($_GET['post_id'])){
	$post_id=$_GET['post_id'];

	$delete_post = "delete from posts where post_id='$post_id'";

	$run_delete=mysqli_query($con,$delete_post);

	if($run_delete){
		echo "<script>alert('A post have been deleted!')</script>";
		echo "<script>window.open('../home.php','_self')</script>";
	}
}

if(isset($_GET['user_id'])){
	$post_id=$_GET['user_id'];

	$delete_user = "delete from users where user_id='$user_id'";

	$run_delete=mysqli_query($con,$delete_user);

	if($run_delete){
		echo "<script>alert('A User have been deleted!')</script>";
		echo "<script>window.open('../admin/a_member.php','_self')</script>";
	}
}
?>