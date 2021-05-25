<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$email=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from patlogin where email='$email' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['email']=$email;
		header("Location:Dashboard.php");
	}
	else
		header("Location:error.php");
}
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}

if(isset($_POST['appo_add']))
{
$specilization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$query=mysqli_query($con,"insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime) values('$specilization','$doctorid','$userid','$fees','$appdate','$time')");
	if($query)
	{
		// echo "<script>alert('Your appointment successfully booked');</script>";
		header("Location:appoadd.php");
	}

}




?>