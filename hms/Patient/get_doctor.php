<?php
include('config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select name,id from doctb where specialization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['name']); ?></option>
  <?php
}
}

if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($con,"select consultancy_fees from doctb where id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['consultancy_fees']); ?>"><?php echo htmlentities($row['consultancy_fees']); ?></option>
  <?php
}
}
?>

