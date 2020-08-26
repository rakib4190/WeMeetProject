<?php 
session_start();
if(isset($_SESSION['user_name'])){
    header("location:seminar.php");
}
?>
<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min1.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/admin_style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <h3 class="heading text-center">Admin Login</h3>
                        <!-- Form Start -->
                        <form  action="index.php" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="user_name" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <button type="submit" class="btn btn-primary float-left" name="login">Login</button>
                            <a href="forgetpass.php" class="float-right">Forgot Password?</a>
                        </form>
                        <!-- /Form  End -->



 <?php 
include'config.php';
if(isset($_POST['login'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $query="SELECT * FROM admin where user_name ='$user_name'AND password='$password'";
    $result=mysqli_query($conn,$query) or die("Query Failed");
    $count = mysqli_num_rows($result);
    if($count>0){
        session_start();
        $_SESSION['user_name']=$user_name;
        header("location:seminar.php");
    }
    else{
        echo "<script>
        alert('wrong email or password');
        window.location.href='index.php';
        </script>";

    }
}
                                        
?> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
