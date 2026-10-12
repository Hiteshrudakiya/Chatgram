<?php 
$con = mysqli_connect("localhost","root","","social_network");
if(isset($_GET['user_id'])){
	$user_id=$_GET['user_id'];

	$delete_user = "delete from users where user_id='$user_id'";

	$run_delete=mysqli_query($con,$delete_user);

	if($run_delete){
		echo "<script>alert('A User have been deleted!')</script>";
		echo "<script>window.open('a_member.php','_self')</script>";
	}
}
?>