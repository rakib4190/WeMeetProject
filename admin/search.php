<?php 
include "header.php";
include 'config.php';
if(isset($_POST['submit'])){
  if($_POST['search']==null){
    header("location:users.php");
  }
  else{
    $search_key=$_POST['search'];
    $query="SELECT * FROM user_registration WHERE user_id = $search_key";
    $result=mysqli_query($conn,$query) or die("Failed");
    $count=mysqli_num_rows($result);
  if($count>0){

 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Users</h1>
              </div>
              <div class="col-md-12">
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
<?php
            }
          }
          else{
            $message="Not Found";
            echo '<h2 style="text-align: center;margin:200px;">'.$message.'</h2>';
               
            }
        }
    }
?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
