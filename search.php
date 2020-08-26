<?php include 'header.php'; 
include 'config.php';
if(isset($_POST['submit'])){
  if($_POST['search']==null){
    header("location:seminar.php");
  }
  else{
    $search_key=$_POST['search'];
    $query="SELECT * FROM all_seminar WHERE seminar_tittle like '%$search_key%'";
    $result=mysqli_query($conn,$query) or die("Failed");
    $count=mysqli_num_rows($result);
  if($count>0){

 ?>

    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Search : Search Term</h2>
                    <div class="post-content">
                        <div class="row">


<?php 
  while($row=mysqli_fetch_assoc($result)){
    ?>
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="admin/upload/<?php echo$row['seminar_img'];?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php'><?php echo $row['seminar_tittle'];?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                           <?php echo $row['venue'];?>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php'>Admin</a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['seminar_date'];?>
                                        </span>
                                    </div>
                                    <p class="description"><?php echo $row['description'];?></p>
                                    <a class='read-more pull-right' href='single.php'>read more</a>
                                </div>
                            </div>

<?php }

  }else{
     header("location:seminar.php");
  }
  
  ?>

                        </div>
                    </div>
                <?php 

        }
    }
?>
                    </div><!-- /post-container -->
                </div>
<?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
  
<?php 
include "footer.php";
 ?>
