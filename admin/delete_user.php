<?php 
include'config.php';
$user_id=$_GET['id'];
 $query="DELETE FROM user_registration WHERE user_id='{$user_id}'";
 $result=mysqli_query($conn,$query) or die("Query Failed");
 if($result){
  	header("location:users.php");
  } 
 ?>