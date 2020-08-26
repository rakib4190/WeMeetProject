<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">All Semiar</h1>
              </div>
              
              <div class="col-md-12">
<?php 
  include'config.php';
  $limit=5;
  if(isset($_GET['page'])){
    $page_number=$_GET['page'];
  }
  else{
    $page_number=1;
  }
  
  $offset=($page_number-1)*$limit;
  $query="SELECT *FROM message ORDER BY msg_id ASC LIMIT {$offset},{$limit}";
  $result=mysqli_query($conn,$query) or die("query failed");
  $count=mysqli_num_rows($result);
  if($count>0){

   ?>                
                  <table class="content-table">
                      <thead>
                          <th>Message ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Message</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
<?php 
  while($row=mysqli_fetch_assoc($result)){
?>                        
                          <tr>
                              <td><?php echo  $row['msg_id']; ?></td>
                              <td><?php echo  $row['name']; ?></td>
                              <td><?php echo  $row['email']; ?></td>
                              <td><?php echo  $row['message']; ?></td>
                              <td class='delete'><a onclick="return confirm(
                              'Are you sure want to delete?')" href='delete_message.php?id=<?php echo  $row['msg_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
<?php  } ?>
                      </tbody>
<?php  } ?>                      
                  </table>
<?php 
$query1="SELECT *FROM message";
$result1=mysqli_query($conn,$query1) OR die("failed");
if(mysqli_num_rows($result1)){
  $total_recoards=mysqli_num_rows($result1);
  $total_page=ceil($total_recoards/$limit);
  echo"<ul class='pagination admin-pagination'>";
  if($page_number>1){
    echo '<li><a href="message.php?page='.($page_number-1).'"><b><<</b></a></li>';
  }
  for($i=1; $i<=$total_page; $i++){
    if($i==$page_number){
      $active="active";
    }
    else{
      $active="";
    }
    echo'<li class='.$active.'><a href="message.php?page='.$i.'">'.$i.'</a></li>';
  }
  if($page_number<$total_page){
     echo '<li><a href="message.php?page='.($page_number+1).'"><b>>></b></a></li>';
  }
 
  echo"</ul>";
}

 ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
