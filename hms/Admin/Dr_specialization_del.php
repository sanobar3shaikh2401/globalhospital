<?php 
	include "config.php";

	$id = $_GET['id'];

	$query="DELETE FROM `doctorspec` WHERE id='$id'";
          $result=mysqli_query($con,$query);

    if($result){
    	 
            header("Location:del_doc_spe.php");
          }
         
 ?>