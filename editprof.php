<?php
   include 'connection.php';
   if(!isset($_SESSION["email"])) 
   {
       header("Location:index.php");
   }
   $reg=$_SESSION['email'];
   $result4 = mysqli_query($con,"SELECT * FROM `register`  where `email`='$reg' AND role=0");
   while($row3 = mysqli_fetch_array($result4))
   {
   $uname=$row3['name'];
   $mobile=$row3['mob'];
   $email=$row3['email'];
   } 
    
   if(isset($_POST['signup']))
   {
     // receiving the values entered and storing in the variables
     //data sanitization is done to prevent SQL injections
     $username=mysqli_real_escape_string($con,$_POST['username']);
     $email=mysqli_real_escape_string($con,$_POST['email']);
     $phno=mysqli_real_escape_string($con,$_POST['phno']);
     $qur= mysqli_query($con,"UPDATE register SET name='$username',email='$email',mob='$phno'  where email='$reg'");
     if ($qur === TRUE){
    header("location:profile.php"); 
     }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>User_Account</title>
    <style>
    .container {
    width: 500px,500px;
    padding:100px 300px;
    background-color:#E6E8DD;
    }
    .form-field input {
    border: solid 2px #f0f0f0;
    border-radius: 3px;
    padding: 10px;
    margin-bottom: 5px;
    font-size: 14px;
    display: block;
    width: 100%;
}
    .header {
    background-color: #FCFEFC;
    border-bottom: 1px solid #000000;
   }
   .sidebar {
    background-color: #A097FF;
}
.sidebar--items a:hover,
.sidebar--bottom-items a:hover {
    background-color: #231FDC;
    color: #FBFFFC;
}

#active--link {
    background-color: #231FDC;
    color: #FBFFFC;
}
    </style>
</head>

<body>
    <section class="header">
        <div class="logo">
        <h2>RAZER</h2>
        </div>
        <div class="search--notification--profile">
        <div></div>
                <h2>Welcome  <?php ECHO $email;?></h2>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="profile.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item">My Profile</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="update_pass.php" >
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Change Password</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="index.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Home</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main--content">
        <div class="container">
        <table>                     
        <form id="signup" class="form" method="POST" action="">
            <div class="form-field">
                <input type="text" name="username" id="username" value=<?php echo  $uname; ?> autocomplete="off">
                <small></small>
            </div>

            <div class="form-field">
                <input type="text" name="email" id="email" value=<?php echo $email; ?> autocomplete="off">
                <small></small>
            </div>
            
            <div class="form-field">
                <input type="text" name="phno" id="phno" value=<?php echo $mobile; ?> autocomplete="off">
                <small></small>
            </div>


            <div class="form-field">
                <input type="submit" value="Update" name="signup" class="btn" style="background-color:yellow">
            </div>
        </form> 
      </table>
                </div>
        </div>
    </div>   
    </section>
</body>

</html>