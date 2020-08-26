<?php include "header.php";
$name_error= "";
$email_error="";
$phn_error="";
$name="";
$email="";
$phn_num="";

if(isset($_POST['save'])){
   $is_valid = 1;

  function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
    }     
  if(empty($_POST['name'])){
    $name_error= "Name is required";
  }else{
    $name=test_input($_POST['name']);
    if(!preg_match("/^[a-zA-Z]*$/",$name)){
      $name_error="Only Letters and white space allowed";
      $is_valid = 0;
    }
  }
  if(empty($_POST['email'])){
    $email_error= "Email is required";
  }else{
    $email=test_input($_POST['email']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $email_error="Invalid email format";
      $is_valid = 0;
    }
  }
  if(empty($_POST['phn_num'])){
    $phn_error= "Phone Number is required";
  }else{
    $phn_num=test_input($_POST['phn_num']);
    /*if(!strlen($phn_num)<=11){
      $phn_error="Phone number must be 11 digit";
       $is_valid = 0;
    }*/
    if(!preg_match("/^[0-9]*$/", $phn_num)){
      $phn_error ="only number is allowed";
        $is_valid = 0;
    }
  }
    
  if($is_valid == 1){
    include "config.php";
     $query= "INSERT INTO admin (email,user_name) VALUES('$email','$name')";
  $result=mysqli_query($conn,$query) or die("Query Failed");
  if($result){
    echo "successfully";
      }
    }
}

 ?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add Speaker</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
                          <span class="error"><?php echo $name_error ?></span>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email ?>">
                          <span class="error"><?php echo $email_error ?></span>
                      </div>
                      <div class="form-group">
                          <label>Phone</label>
                          <input type="text" name="phn_num" class="form-control" placeholder="phone number" value="<?php echo $phn_num ?>">
                          <span class="error"><?php echo $phn_error ?></span>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
