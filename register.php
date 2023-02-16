<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: login2.php");
        die();
    }
//Load Composer's autoloader
require 'vendor1/autoload.php';
include 'connection.php';
$msg="";
if(isset($_POST['signup']))
  {
    // receiving the values entered and storing in the variables
    //data sanitization is done to prevent SQL injections
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phno=mysqli_real_escape_string($con,$_POST['phno']);
    $role=mysqli_real_escape_string($con,$_POST['role']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $password_2=mysqli_real_escape_string($con,$_POST['confirmpassword']);
    $code = mysqli_real_escape_string($con, md5(rand()));
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $pincode=mysqli_real_escape_string($con,$_POST['pincode']);
     
    if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM register WHERE email = '{$email}'")) > 0)
    
    {  
       echo "<script> alert('This email address has been already exists')</script>";
    }
    else
    {
    if($password === $password_2)
    {
    $qury="INSERT INTO register (name,email,mob,role,address,pincode) VALUES('$username','$email','$phno','$role','$address','$pincode')";
    $qury1="INSERT INTO tbllogin (email,password,code,role) VALUES('$email','$password','$code','$role')";
    $result = mysqli_query($con, $qury);
    $result1 = mysqli_query($con, $qury1);
    if ($result && $result1) {
        echo "<div style='display: none;'>";
        //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'teslaelectronics89@gmail.com';                     //SMTP username
$mail->Password   = 'rngyitangspomjml';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('teslaelectronics89@gmail.com');
$mail->addAddress($email);    


//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'no reply';
$mail->Body    = 'Here is the verification link <b><a href="http://localhost/pomato/login2.php?verification='.$code.'">http://localhost/pomato/login2.php?verification='.$code.'</a></b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
$msg= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo "<script> alert('A verification code has been send to your email')</script>";
}    
     else {
                    $msg="<div class='alert alert-danger'>Something wrong went.</div";
          }  
        }else{
            $msg="<div class=alert>'alert-danger'password and confirm password do not match'</div>";
}
}
}  
	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style1.css">  
</head>

<body>
    <div class="container">
        <form id="signup" class="form" method="POST" action="register.php"required>
            <h1>Sign Up</h1>
            <div class="form-field">
                <label for="username">Name:</label>
                <input type="text" name="username" id="username" autocomplete="off"required>
                <small></small>
            </div>

            <div class="form-field">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" autocomplete="off"required>
                <small></small>
            </div>
            
            <div class="form-field">
                <label for="phno">Phone No:</label>
                <input type="text" name="phno" id="phno" autocomplete="off"required>
                <small></small>
            </div>
            <div class="form-field">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" autocomplete="off" required>
                <small></small>
            </div>
            <div class="form-field">
                <label for="pincode">pincode:</label>
                <input type="text" name="pincode" id="pincode" autocomplete="off" required>
                <small></small>
            </div>

            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off"required>
                <small></small>
            </div>


            <div class="form-field">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" name="confirmpassword" id="confirm-password" autocomplete="off" required>
                <small></small>
                </div>

            
            <div class="form-field">
                <label for ="role">select role</label>
            </div>
            <div>
                <input type="radio" name="role" id="role" value = 2>
                <label>seller</label>
            </div>
            <div>
                <input type="radio" name="role" id="role" value = 0>
                <label>customer</label>
            </div>

            <div class="form-field">
                <input type="submit" value="Sign up" name="signup" class="btn">
            </div>
            <p>
                Already having an account? <a href="login2.php">Login Here!</a>
            </p>
        </form>
    </div>
    <script src=register.js></script>
</body>
</html>