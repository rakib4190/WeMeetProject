<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">

<?php 
include'config.php';
  $id=$_GET['id'];
  $query1="SELECT *FROM all_seminar WHERE seminar_id={$id}";
  $result1=mysqli_query($conn,$query1);
  $count=mysqli_num_rows($result1);
  if($count>0){
    while($row=mysqli_fetch_assoc($result1)){

 ?> 
        
                            <h3><?php echo $row['seminar_tittle'];?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                   <?php echo $row['venue'];?>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['seminar_date'];?>
                                </span>
                            </div>
                            <div>
                                <img class="single-feature-image" src="admin/upload/<?php echo$row['seminar_img'];?>" alt=""/>
                                <p class="description"><?php echo $row['description'];?></p>
                            </div>
                            <div>
                                <h3>Seminar Schedule</h3>
                                 <table class="table table-striped">
  
                                    <tbody>
                                      <tr>
                                        <td>Date</td>
                                        <td><?php echo $row['seminar_date'];?></td>
                                      </tr>
                                        <tr>
                                        <td>Time</td>
                                        <td><?php echo $row['seminar_time'];?></td>
                                      </tr>
                                       <tr>
                                        <td>Speaker</td>
                                        <td><?php echo $row['speaker'];?></td>
                                      </tr>
                                       <tr>
                                        <td>Venue</td>
                                        <td><?php echo $row['venue'];?></td>
                                      </tr>
                                    </tbody>
                                </table>
                                 <div class="col-md-2 " style="border: 1px solid green;padding: 10px;">
                                    <a class="" style="hover:red;" href="registration.php?id=<?php echo  $row['seminar_id']; ?>">Registration</a>
                                </div>
                            </div>

<?php }

  } ?>
                    
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
