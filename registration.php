<?php 
include "config.php";
$seminar_id=$_GET['id'];
$name_error= "";
$email_error="";
$phn_error="";
$name="";
$email="";
$phn_num="";

if(isset($_POST['submit'])){
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
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
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
    $query="INSERT INTO user_registration (name,email,phone,seminar_id) VALUES('$name','$email','$phn_num','$seminar_id')";
    $result=mysqli_query($conn,$query) or die("Query failed.");
    if($result){
      echo "<script>
        alert('Congratulation!!!Your Registration Id Send your email');
        window.location.href='index.php';
        </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <section class="reg-form">
            
            <div class="container1">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Registration Form</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" placeholder="Your Name" required="" value="<?php echo $name ?>">
                             <span class="error" style="color:red;"><?php echo $name_error ?></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" placeholder="Your Email" required="" value="<?php echo $email ?>">
                            <span class="error" style="color:red;"><?php echo $email_error ?></span>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-input" name="phn_num" placeholder="Your Phone Number" required="" value="<?php echo $phn_num ?>">
                            <span class="error" style="color:red;"><?php echo $phn_error ?></span>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-input" name="seminar_id" value="<?php echo $seminar_id ?>" />
                        </div>
                        
                        <div class="form-group">
                            <input type="checkbox" name="agree_term" class="agree-term" required="">
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="about.php" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-submit" value="Registration"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <!-- JS -->
    <script src="js/vendor/jquery.min.js"></script>
</body>
</html>