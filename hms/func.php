<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
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
function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}
if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$query="insert into doctb(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}

function get_doctor_specialization() {
      global $con;
      $query = "SELECT * FROM doctorspec";
      $result = mysqli_query($con, $query);
      $count = 1;
       
      while ($row = mysqli_fetch_array($result)) {
         $specialization=$row['specialization'];
        

        echo "<tr>
              <td>$count</td>
              <td>$specialization</td>
            </tr>";

        $count = $count+1;
      }
    }

    if(isset($_POST['doc_spe']))
        {
          $specialization=$_POST['specialization'];
          $query="insert into doctorspec(specialization) values('$specialization')";
          $result=mysqli_query($con,$query);
          if($result){
            header("Location:Dr_specialization.php");
          }
        }
// function display_admin_panel(){
// 	echo '';
// }

    
?>