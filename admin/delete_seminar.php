<?php 
include'config.php';
$seminar_id=$_GET['id'];
 $query="DELETE FROM all_seminar WHERE seminar_id='{$seminar_id}'";
 $result=mysqli_query($conn,$query) or die("Query Failed");
 if($result){
  	header("location:seminar.php");
  } 
 ?>