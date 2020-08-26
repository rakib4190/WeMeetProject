<?php 
include "header.php";
include'config.php';
if(isset($_POST['submit'])){
  $id=mysqli_real_escape_string($conn,$_POST['seminar_id']);
  $title=mysqli_real_escape_string($conn,$_POST['seminar_title']);
  $description=mysqli_real_escape_string($conn,$_POST['seminardesc']);
  $seminar_date=mysqli_real_escape_string($conn,$_POST['seminar_date']);
  $seminar_time=mysqli_real_escape_string($conn,$_POST['seminar_time']);
  $speaker=mysqli_real_escape_string($conn,$_POST['seminar_speaker']);
  $venue=mysqli_real_escape_string($conn,$_POST['seminar_venue']);
  if(empty($_FILES['new-image']['name'])){
    $new_name=$_POST['old-image'];
  }
  else{
    $errors=array();
    $file_name=$_FILES['new-image']['name'];
    $file_size=$_FILES['new-image']['size'];
    $file_tmp=$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
    $file_div=explode('.',$file_name);
    $file_ext=end($file_div);
    $extensions=array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions)== false){
      $errors[]="This extension file not allowed, Please choose a JPG or JPEG or PNG file";
    }
    if($file_size>2097152){
      $errors[]="Maximum File size 2MB or Lower";
    }
    $new_name= time()."-".basename($file_name);
    $target="upload/".$new_name;
    if(empty($errors)==true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
}

  $query="UPDATE all_seminar SET seminar_tittle='{$title}',description='{$description}',seminar_date='{$seminar_date}',seminar_time='{$seminar_time}',speaker='{$speaker}',venue='{$venue}',seminar_img='{$new_name}' WHERE seminar_id='{$id}'";
  $result=mysqli_query($conn,$query) or die("Query Failed");
  if($result){
    header("location:seminar.php");
  } 
}

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Seminar</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">

<?php 
include'config.php';
  $id=$_GET['id'];
  $query1="SELECT *FROM all_seminar WHERE seminar_id={$id}";
  $result1=mysqli_query($conn,$query1);
  $count=mysqli_num_rows($result1);
  if($count>0){
    while($row=mysqli_fetch_assoc($result1)){

 ?>        
        <!-- Form for show edit-->
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="seminar_id"  class="form-control" value="<?php echo  $row['seminar_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="seminar_title"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['seminar_tittle']; ?>">
            </div>
            <div class="form-group">
                <label for="description"> Description</label>
                <textarea name="seminardesc" class="form-control"  required rows="5">
                    <?php echo  $row['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="seminar_date"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['seminar_date']; ?>">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" name="seminar_time"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['seminar_time']; ?>">
            </div>
            <div class="form-group">
                <label for="speaker">Speaker</label>
                <input type="text" name="seminar_speaker"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['speaker']; ?>">
            </div>
            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" name="seminar_venue"  class="form-control" id="exampleInputUsername" value="<?php echo  $row['venue']; ?>">
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo  $row['seminar_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo  $row['seminar_img']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->

<?php 
    }
}
 ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
