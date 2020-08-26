<?php
// Initialize variables to null.

$comp_nameError ="";
$compLicenseeNameError ="";

if(isset($_POST['comp_name']))  {
    $comp_name= $_POST['comp_name'];
}
if(isset($_POST['comp_licensee_name'])) {
    $comp_licensee_name= $_POST['comp_licensee_name'];
}

//On submitting form below function will execute
if (isset($_POST['submit'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    return $data;
    }           

    //-------------------------Form Validation Start---------------------//
   if (empty($_POST["comp_name"])) {
     $comp_nameError = "Name is required";
   } else {
     $comp_name = test_input($_POST["comp_name"]);
     // check name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$comp_name)) {
       $comp_nameError = "Only letters and white space allowed"; 
     }
   }

   if (empty($_POST["comp_licensee_name"])) {
     $compLicenseeNameError = "Company Licensee Name is required";
   } else {
     $comp_licensee_name = test_input($_POST["comp_licensee_name"]);
   }}
   //-------------------------Form Validation End---------------------//
?>


<html>
    <head>

    <link rel="stylesheet" href="style/style.css" />
    </head>
    <body>

        <div class="maindiv">
            <div class="form_div">    
            <form method="post" action="">                   
                <span class="error">* required field.</span>

                <br>
                <hr/>
                <br>
                Company Name:<br><input class="input" type="text" name="comp_name" value="">
                <span class="error">* <?php echo $comp_nameError;?></span>
                <br>         

                Company Licensee:<br><input class="input" type="text" name="comp_licensee_name" value="">
                <span class="error">* <?php echo $compLicenseeNameError;?></span>
                <br>    

                <input class="submit" type="submit" name="submit" value="Submit"> 
            </form>
            </div>          
        </div>
    </body>
</html>