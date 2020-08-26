<?php 
    include "header.php";
 ?>
 <!-- slider_area_start -->
    <div class="slider_area slider_bg_1">
        <div class="slider_text">
            <div class="container">
                <div class="position_relv">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="title_text title_text2 ">
                                <h3>All Seminar</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="countDOwn_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_date">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>ICCB, Dhaka</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="single_date">
                            <i class="fas fa-clock"></i>
                            <span>25-27 Aug 2020</span>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-12 col-lg-5">
                        <span id="clock"></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

     <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content">
                        <div class="row">

<?php 
include "config.php";
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
     while($row=mysqli_fetch_assoc($result)){
    $row['seminar_id'];
    $row['seminar_tittle'];
    $shortdes=$row['description'];
    $row['seminar_date'];
    $row['seminar_time'];
    $row['speaker'];
    $row['venue'];
    $row['seminar_img'];
        

 ?>
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="admin/upload/<?php echo$row['seminar_img'];?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php'><?php echo $row['seminar_tittle'];?></a></h3>
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
                                    <p class="description"><?php echo $row['description'];?></p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row['seminar_id'];?>'>read more</a>
                                </div>
                            </div>


<?php }

  } ?>
                        </div>
                    </div>
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
                    </div><!-- /post-container -->
                </div>
<?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>


    
<?php 
include "footer.php";
 ?>