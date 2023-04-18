<!DOCTYPE html>
<html>
  <head>
      <title>Login</title>
      <link rel="stylesheet" href="style1.css">
      <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
  </head>
  <body>
    <style>
      .error_form
{
top: 12px;
color: rgb(216, 15, 15);
    font-size: 15px;
font-weight:bold;
    font-family: Helvetica;
}
</style>
    <div class="container">
      <form id="login" class="form" method="POST" action="login2.php">
        <h1>Login</h1>
        <div class="form-field">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" autocomplete="off" required>
          <small></small>
        </div>
        <div class="form-field">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" autocomplete="off"required>
          <small></small>
        </div>
        
<span class="error_form" id="captcha_message"></span>
        <div class="g-recaptcha" data-sitekey="6LdHRGIkAAAAAFNcuLGiTcZT1fAlNMf7wFMAp4rt"></div>
        <div class="form-field">
          <input id="submit" type="submit" value="Login" name="login" class="btn">
        </div>
        <p>
          New Here?
          <a href="register.php">
            Click here to register!
          </a>
        </p>
      </form>
    </div>
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
 
  $(document).on('click','#submit',function()
  {  $("#captcha_message").hide();
 var response = grecaptcha.getResponse();
 if(response.length == 0)
 {
 $("#captcha_message").html("Please verify you are not a robot");
               $("#captcha_message").show();
 return false;
 }
 else{
 $("#captcha_message").hide();
 return true;
 }
  });
 
 
</script>
  </body>
</html>
<?php 
  include 'connection.php';
  $msg="";
   if(isset($_SESSION["email"]))
   {
      header("Location:./");
   }

   if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM tbllogin WHERE code='{$_GET['verification']}'")) > 0) {
        $query = mysqli_query($con, "UPDATE tbllogin SET code='' WHERE code='{$_GET['verification']}'");
        
        if ($query) {
            echo("<div class='alert alert-info'>Account verification has been successfully completed.</div>");
        }
    } else {
        header("Location: login2.php");
    }
}

  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        /*$password = md5($password);*/ 
        $sql="SELECT * from tbllogin where email='".$email."' AND password='".$password."' AND status = 1";
        $res=$con->query($sql);
        if($res->num_rows > 0)
        {
          foreach($res as $data)
          {
            $email=$data['email'];
            $id=$data['id'];
            $password=$data['password'];
            $role=$data['role'];
            $status=$data['status'];
            $code=$data['code'];
            $name=$data['username'];
            
          }
          if(empty($data['code']))
          {
          $_SESSION['email'] = $email;
          $_SESSION['username'] = $name;

          $_SESSION['msg']="Login Successful. ";
          echo "<p id='d'>" .$_SESSION['msg']."</p>" ;

          if($role == 0 )
            {
                header("location:index.php");  
            }
            else if($role == 1)
            {
                header("location:admindashboard.php");  
            }
            else if($role == 2)
            {
                header("location:seller.php");  
            }
          }
          else {
            echo("<div class='alert alert-info'>First verify your account and try again. or your access is deneied</div>");
       }
   }
   else
   {
     $_SESSION['msg']=" <div class='alert alert-danger'>Invalid username or password.</div> ";
     echo "<p id='d'>" .$_SESSION['msg']."</p>" ;
     exit();
   }
}
  }
?>