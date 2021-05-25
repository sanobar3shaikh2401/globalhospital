<?php 
	include "config.php";

	$id = $_GET['id'];

	$query="DELETE FROM `doctb` WHERE id='$id'";
          $result=mysqli_query($con,$query);

    if($result)
    {
      header("Location:del_doc.php");
    }
 ?>