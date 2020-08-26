<?php 
include"header.php";
$name_error= "";
$email_error="";
$name="";
$email="";

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
  $message=$_POST['message'];

  if($is_valid == 1){
    include "config.php";
    $query="INSERT INTO message (name,email,message) VALUES('$name','$email','$message')";
    $result=mysqli_query($conn,$query) or die("Query failed.");
    if($result){
      echo "<script>
        alert('Thanks for your messaging.....');
        window.location.href='index.php';
        </script>";
        }
    }
}
?>

    <!-- slider_area_start -->
    <div class="slider_area slider_bg_1">
        <div class="slider_text">
            <div class="container">
                <div class="position_relv">
                    <div class="row">
                            <div class="col-xl-8 col-lg-8">
                                <div class="title_text title_text2 ">
                                    <h3>contact</h3>
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
                            <i class="ti-location-pin"></i>
                            <span>City Hall, New York City</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="single_date">
                            <i class="ti-alarm-clock"></i>
                            <span>12-15 Sep 2019</span>
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

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">

    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" type="text" placeholder="Enter your name" value="<?php echo $name?>">
                                        <span class="error" style="color:red;"><?php echo $name_error ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" type="text" placeholder="Email" value="<?php echo $email ?>">
                                        <span class="error" style="color:red;"><?php echo $email_error ?></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message"cols="30" rows="9"placeholder="Enter message">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" name="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-address-card"></i></span>
                            <div class="media-body">
                                <h3>Dhaka, Bangladesh</h3>
                                <p>Dhanmondhi, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-mobile-alt"></i></span>
                            <div class="media-body">
                                <h3>+880 1712 343536</h3>
                                <p>Sun to Thu 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-envelope"></i></span>
                            <div class="media-body">
                                <h3>wemeet@gmail.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
   <?php 
   include"footer.php";
    ?>