<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$email=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from doclogin where email='$email' and password='$password';";
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
function manage_pat()
{
	global $con;
	$query="select * from patdb";
	$result=mysqli_query($con,$query);
	$count = 1;
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		$patname=$row['patname'];
		$patcontact=$row['patcontact'];
		$patemail=$row['patemail'];
		$gender=$row['gender'];
		$pataddress=$row['pataddress'];
		$patage=$row['patage'];
		$medhis=$row['medhis'];


		echo "<tr>
			  <td>$count</td>
              <td>$patname</td>
              <td>$patcontact</td>
              <td>$gender</td>
              <td><a href='patient_update.php?id=$id'><i class='fas fa-edit' style ='color: #00ff00;font-size:18px' title = 'Update'>&nbsp; | &nbsp;</i></a>
               <a href='pat_view.php?id=$id'><i class='fa fa-eye' style ='color: #3498DB;font-size:18px' title = 'View'></i></td></a>
            </tr>";

		$count = $count+1;
	}
}
if(isset($_POST['pat_add']))
{
	$patname=$_POST['patname'];
	$patcontact=$_POST['patcontact'];
	$patemail=$_POST['patemail'];
	$gender=$_POST['gender'];
	$pataddress=$_POST['pataddress'];
	$patage=$_POST['patage'];
	$medhis=$_POST['medhis'];
	$query="insert into patdb(id, patname, patcontact, patemail, gender, pataddress, patage, medhis)values('' ,'$patname', '$patcontact', '$patemail', '$gender', '$pataddress', '$patage', '$medhis')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:manage_pat.php");
}


if(isset($_POST['pat_upd']))
        {
          $spe_id = $_POST['id'];
          $patname=$_POST['patname'];
		  $patcontact=$_POST['patcontact'];
		  $patemail=$_POST['patemail'];
		  $gender=$_POST['gender'];
		  $pataddress=$_POST['pataddress'];
		  $patage=$_POST['patage'];
		  $medhis=$_POST['medhis'];
          $query="update patdb set patname='$patname', patcontact='$patcontact', patemail='$patemail', gender='$gender', pataddress='$pataddress', patage='$patage', medhis='$medhis' where id='$spe_id'";
          $result=mysqli_query($con,$query);
          if($result){
            header("Location:manage_pat.php");
          }
        }

function pat_view()
{
	if (isset($_GET['id'])) {
    	$spe_id = $_GET['id'];
		global $con;
		$query="select * from patdb where id = '$spe_id'";
		$result=mysqli_query($con,$query);
		//$count = 1;
	while($row=mysqli_fetch_array($result))
	{
		
		$spe_id=$row['id'];
		$patname=$row['patname'];
		$patcontact=$row['patcontact'];
		$patemail=$row['patemail'];
		$gender=$row['gender'];
		$pataddress=$row['pataddress'];
		$patage=$row['patage'];
		$medhis=$row['medhis'];


		echo "<table border='1' class='table table-bordered'>
 <tr  class='bg-dark'>
<td colspan='4' style='font-size:20px;color:#fff'>
 Patient Details</td></tr>

    <tr>
    <th scope>Patient Name</th>
    <td>$patname</td>
    <th scope>Patient Email</th>
    <td>$patemail</td>
  </tr>
  <tr>
    <th scope>Patient Mobile Number</th>
    <td>$patcontact</td>
    <th>Patient Address</th>
    <td>$pataddress</td>
  </tr>
    <tr>
    <th>Patient Gender</th>
    <td>$gender</td>
    <th>Patient Age</th>
    <td>$patage</td>
  </tr>
  <tr>
    
    <th>Patient Medical History(if any)</th>
    <td>$medhis</td>
  </tr>
 
</table>";

		//$count = $count+1;
	}
}
}

if(isset($_POST['medhis_add']))
{
	global $con;
	$patid=$_GET['id'];
	$bp=$_POST['bp'];
	$bs=$_POST['bs'];
	$weight=$_POST['weight'];
	$bodytemp=$_POST['bodytemp'];
	$pres=$_POST['pres'];
	
	$query="INSERT INTO medhisdb(patid,bp,bs,weight,bodytemp,pres)VALUES('$patid','$bp','$bs', '$weight','$bodytemp','$pres')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:pat_view.php");
}

function pat_medhis_display()
{
	global $con;

	// $patid=$_GET['id'];
	$query="select * from medhisdb";
	$result=mysqli_query($con,$query);
	$count = 1;
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['id'];
		$bp=$row['bp'];
		$bs=$row['bs'];
		$weight=$row['weight'];
		$bodytemp=$row['bodytemp'];
		$pres=$row['pres'];


		echo "<tr>
			  <td>$id</td>
			  <td>$bp</td>
              <td>$bs</td>
              <td>$weight</td>
              <td>$bodytemp</td>
              </tr>";

		$count = $count+1;
	}
}

// function pat_update() {
//         	if (isset($_GET['id'])) {
//         		$spe_id = $_GET['id'];
//         		global $con;
// 			    $query = "SELECT * FROM patdb WHERE id = '$spe_id'";
// 			    $result = mysqli_query($con, $query);

// 			    while ($row = mysqli_fetch_array($result)) {
//       	 		$spe_id=$row['id'];
//          		$patname=$row['patname'];
// 				$patcontact=$row['patcontact'];
// 				$patemail=$row['patemail'];
// 				$gender=$row['gender'];
// 				$pataddress=$row['pataddress'];
// 				$patage=$row['patage'];
// 				$medhis=$row['medhis'];

			 
               
//         	}
//         }
//        }

// function get_doctor_specialization() {
//       global $con;
//       $query = "SELECT * FROM doctorspec";
//       $result = mysqli_query($con, $query);
//       $count = 1;
       
//       while ($row = mysqli_fetch_array($result)) {
//          $specialization=$row['specialization'];
        

//         echo "<tr>
//               <td>$count</td>
//               <td>$specialization</td>
//             </tr>";

//         $count = $count+1;
//       }
//     }

//     if(isset($_POST['doc_spe']))
//         {
//           $specialization=$_POST['specialization'];
//           $query="insert into doctorspec(specialization) values('$specialization')";
//           $result=mysqli_query($con,$query);
//           if($result){
//             header("Location:Dr_specialization.php");
//           }
//         }
// function display_admin_panel(){
// 	echo '';
// }

    
?>