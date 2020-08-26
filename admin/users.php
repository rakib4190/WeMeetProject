<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-7">
                  <h1 class="admin-heading">Registered People</h1>
              </div>
              <div class="col-md-3" style="background-color:#F1F1F1">
                <form class="search-post navbar-form" action="search.php" method ="POST">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search by ID">
                  <span class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                  </span>
                </div>
                  </form>
              </div>
              <div class="col-md-2" >
                  <a class="add-new" href="add_user.php">add People</a>
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
  $query="SELECT *FROM user_registration ORDER BY user_id ASC LIMIT {$offset},{$limit}";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
  if($count>0){

   ?>
                  <table class="content-table">
                      <thead>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Seminar Id</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>

  <?php 
  while($row=mysqli_fetch_assoc($result)){
    $row['user_id'];
    $row['name'];
    $row['email'];
    $row['phone'];
    $row['seminar_id'];
    ?>
                          <tr>
                              <td><?php echo  $row['user_id']; ?></td>
                              <td><?php echo  $row['name']; ?></td>
                              <td><?php echo  $row['email']; ?></td>
                              <td><?php echo  $row['phone']; ?></td>
                              <td><?php echo  $row['seminar_id']; ?></td>
                              <td class='edit'><a href='update_user.php?id=<?php echo  $row['user_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a onclick="return confirm(
                              'Are you sure want to delete?')" href='delete_user.php?id=<?php echo  $row['user_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
  <?php  } ?>
                      </tbody>
  <?php } ?>
                  </table>
<?php 
$query1="SELECT *FROM user_registration";
$result1=mysqli_query($conn,$query1) OR die("failed");
if(mysqli_num_rows($result1)){
  $total_recoards=mysqli_num_rows($result1);
  $total_page=ceil($total_recoards/$limit);
  echo"<ul class='pagination admin-pagination'>";
  if($page_number>1){
    echo '<li><a href="users.php?page='.($page_number-1).'"><b><<</b></a></li>';
  }
  for($i=1; $i<=$total_page; $i++){
    if($i==$page_number){
      $active="active";
    }
    else{
      $active="";
    }
    echo'<li class='.$active.'><a href="users.php?page='.$i.'">'.$i.'</a></li>';
  }
  if($page_number<$total_page){
     echo '<li><a href="users.php?page='.($page_number+1).'"><b>>></b></a></li>';
  }
 
  echo"</ul>";
}

 ?>
                  
                      <!--<li class="active"><a>1</a></li>-->
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
