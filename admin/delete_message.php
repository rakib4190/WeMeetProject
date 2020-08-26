<?php 
include'config.php';
$msg_id=$_GET['id'];
 $query="DELETE FROM message WHERE msg_id='{$msg_id}'";
 $result=mysqli_query($conn,$query) or die("Query Failed");
 if($result){
  	header("location:message.php");
  } 
 ?>