<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Semiar</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add_seminar.php">add seminar</a>
              </div>
              <div class="col-md-12">
<?php 
  include'config.php';
  $limit=3;
  if(isset($_GET['page'])){
    $page_number=$_GET['page'];
  }
  else{
    $page_number=1;
  }
  
  $offset=($page_number-1)*$limit;
  $query="SELECT *FROM all_seminar ORDER BY seminar_id ASC LIMIT {$offset},{$limit}";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0){

   ?>                
                  <table class="content-table">
                      <thead>
                          <th>Seminar ID</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Speaker</th>
                          <th>Venue</th>
                          <!--<th>Picture</th>-->
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
<?php 
  while($row=mysqli_fetch_assoc($result)){

?>                        
                          <tr>
                              <td><?php echo  $row['seminar_id']; ?></td>
                              <td><?php echo  $row['seminar_tittle']; ?></td>
                              <td><?php echo  $row['description']; ?></td>
                              <td><?php echo  $row['seminar_date']; ?></td>
                              <td><?php echo  $row['seminar_time']; ?></td>
                              <td><?php echo  $row['speaker']; ?></td>
                              <td><?php echo  $row['venue']; ?></td>
                             <!-- <td><img src="uploa/<?php //echo  $row['seminar_img']; ?>" alt="" width="75px" height="75px"></td>-->
                              <td class='edit'><a href='update_seminar.php?id=<?php echo $row['seminar_id'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a onclick="return confirm(
                              'Are you sure want to delete?')" href='delete_seminar.php?id=<?php echo  $row['seminar_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
<?php  } ?>
                      </tbody>
<?php  } ?>                      
                  </table>
<?php 
$query1="SELECT *FROM all_seminar";
$result1=mysqli_query($conn,$query1) OR die("failed");
if(mysqli_num_rows($result1)){
  $total_recoards=mysqli_num_rows($result1);
  $total_page=ceil($total_recoards/$limit);
  echo"<ul class='pagination admin-pagination'>";
  if($page_number>1){
    echo '<li><a href="seminar.php?page='.($page_number-1).'"><b><<</b></a></li>';
  }
  for($i=1; $i<=$total_page; $i++){
    if($i==$page_number){
      $active="active";
    }
    else{
      $active="";
    }
    echo'<li class='.$active.'><a href="seminar.php?page='.$i.'">'.$i.'</a></li>';
  }
  if($page_number<$total_page){
     echo '<li><a href="seminar.php?page='.($page_number+1).'"><b>>></b></a></li>';
  }
 
  echo"</ul>";
}

 ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
