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
function display_spe()
{
	global $con;
	$query="select * from doctorspec";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$specialization=$row['specialization'];
		echo '<option value="'.$specialization.'">'.$specialization.'</option>';
	}
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

if(isset($_POST['add_doc']))
{
	$specialization=$_POST['specialization'];
	$name=$_POST['name'];
	$clinic_address=$_POST['address'];
	$consultancy_fees=$_POST['fees'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$confirm_pass=$_POST['conpass'];
	$query="insert into doctb(specialization, name, clinic_address, consultancy_fees, contact, email, password, confirm_pass) values('$specialization','$name', '$clinic_address', '$consultancy_fees', '$contact', '$email', '$password', '$confirm_pass')";
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
      	 $id=$row['id'];
         $specialization=$row['specialization'];
        

       echo "<tr>
              <td>$count</td>
              <td>$specialization</td>
               <td><a href='Dr_specialization_update.php?id=$id'><i class='fas fa-edit' style ='color: #00ff00;font-size:18px' title = 'Update'>&nbsp; | &nbsp;</i></a>
               <a href='Dr_specialization_del.php?id=$id'><i class='fa fa-trash' name = 'doc_spe_del' style ='color: #ff0000;font-size:18px' title = 'Delete'></i></td></a>
            </tr>";

        $count = $count+1;
      }
    }

    if(isset($_POST['doc_spe']))
        {
          $specialization=$_POST['specialization'];
          $query="insert into doctorspec(id, specialization) values('','$specialization')";
          $result=mysqli_query($con,$query);
          if($result){
            header("Location:add_spe.php");
          }
        }

        function get_doctor_specialization_update() {
        	if (isset($_GET['id'])) {
        		$spe_id = $_GET['id'];
        		global $con;
			    $query = "SELECT * FROM doctorspec WHERE id = '$spe_id'";
			    $result = mysqli_query($con, $query);

			    while ($row = mysqli_fetch_array($result)) {
      	 		$spe_id=$row['id'];
         		$specialization=$row['specialization'];

			    echo "<form class='form-group' method='POST' action='func.php'>
			    	<input type='hidden' name='id' value=$spe_id  class='form-control'>
                    <label>Doctor Specialization: </label>
                    <input type='text' name='specialization' value='$specialization'  class='form-control'>
                    <br>
                    <input type='submit' name='doc_spe_upd' value='Update' class='btn btn-primary'>
                  </form>";
        	}
        }
       }

       if(isset($_POST['doc_spe_upd']))
        {
          $spe_id = $_POST['id'];
          $specialization=$_POST['specialization'];
          $query="update doctorspec set specialization='$specialization' where id='$spe_id'";
          $result=mysqli_query($con,$query);
          if($result){
            header("Location:update_doc_spe.php");
          }
        }


        function get_Manage_doctor() {
      global $con;

      $query = "SELECT * FROM doctb";
      $result = mysqli_query($con, $query);
       $count = 1;
       
      while ($row = mysqli_fetch_array($result)) {
         $id=$row['id'];
         $specialization=$row['specialization'];
         $name=$row['name'];
        

        echo "<tr>
              <td>$count</td>
              <td>$specialization</td>
              <td>$name</td>
              <td>
              <a href='Dr_update.php?id=$id'><i class='fas fa-edit' style ='color: #00ff00;font-size:18px' title = 'Update'>&nbsp; | &nbsp;</i></a>
               <a href='Dr_del.php?id=$id'><i class='fa fa-trash' name = 'doc_spe_del' style ='color: #ff0000;font-size:18px' title = 'Delete'></i></td></a>
            </tr>";

         $count = $count+1;
      }
    }

     function get_doctor_update() {
          if (isset($_GET['id'])) {
            $spe_id = $_GET['id'];
            global $con;
          $query = "SELECT * FROM doctb WHERE id = '$spe_id'";
          $result = mysqli_query($con, $query);

          while ($row = mysqli_fetch_array($result)) {
            $spe_id=$row['id'];
            $specialization=$row['specialization'];
            $name=$row['name'];
            $clinic_address=$row['clinic_address'];
            $consultancy_fees=$row['consultancy_fees'];
            $contact=$row['contact'];
            $email=$row['email'];
            $password=$row['password'];
            $confirm_pass=$row['confirm_pass'];

          echo "<form class='form-group' method='POST' action='func.php'>
                  <input type='hidden' name='id' value=$spe_id  class='form-control'>
                    <label>Doctor Specialization: </label>
                    <select name='specialization' class='form-control' >
                      <!--<option value='Dr. Punam Shaw'>Dr. Punam Shaw</option>
                      <option value='Dr. Ashok Goyal'>Dr. Ashok Goyal</option> -->
                      <option value='.$specialization.'>$specialization</option>
                    </select>
                    <br>
                    <label>Doctor Name: </label>
                    <input type='text' name='name' value = '$name' placeholder='Enter Doctor Name' class='form-control'>
                    <br>
                    <label>Doctor Clinic Address: </label>
                    <input type='text' name='address' value = '$clinic_address' value = '$name' placeholder='Enter Doctor Clinic Address' class='form-control'>
                    <br>
                    <label>Doctor Consultancy Fees: </label>
                    <input type='number' name='fees' value = '$consultancy_fees' placeholder='Enter Doctor Consultancy Fees' class='form-control'>
                    <br>
                    <label>Doctor Contact no: </label>
                    <input type='number' name='contact' value = '$contact' placeholder='Enter Doctor Contact no' class='form-control'>
                    <br>
                    <label>Doctor Email: </label>
                    <input type='email' name='email' value = '$email' placeholder='Enter Doctor Email' class='form-control'>
                    <br>
                    <label>Password: </label>
                    <input type='text' name='pass' value = '$password' placeholder='Enter Password' class='form-control'>
                    <br>
                    <label>Confirm Password: </label>
                    <input type='text' name='conpass' value = '$confirm_pass' placeholder='Enter Confirm Password' class='form-control'>
                    <br>
                    <input type='submit' name='update_doc' value='Update' class='btn btn-primary'>
                  </form>";
          }
        }
       }

       if(isset($_POST['update_doc']))
        {
          $spe_id = $_POST['id'];
          $specialization=$_POST['specialization'];
          $name=$_POST['name'];
          $clinic_address=$_POST['address'];
          $consultancy_fees=$_POST['fees'];
          $contact=$_POST['contact'];
          $email=$_POST['email'];
          $password=$_POST['pass'];
          $confirm_pass=$_POST['conpass'];

          $query="update doctb set specialization='$specialization', name='$name', clinic_address='$clinic_address', consultancy_fees='$consultancy_fees', contact='$contact', email='$email', password='$password', confirm_pass='$confirm_pass' where id='$spe_id'";
          $result=mysqli_query($con,$query);
          if($result){
            header("Location:update_doc.php");
          }
        }

// function display_admin_panel(){
// 	echo '';
// }

    
?>