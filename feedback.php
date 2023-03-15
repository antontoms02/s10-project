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
   }
   if(isset($_POST['signup']))
  {
   $feed=mysqli_real_escape_string($con,$_POST['feedback']);
   $del ="INSERT INTO `feedback`(email,feedback) VALUES ('$reg','$feed')";
   $query_run = mysqli_query($con,$del);
   if($query_run)
 {
    echo "<script> alert('Feedback Successfully'); </script>";   
 }
 else{
    echo "<script> alert('ERROR'); </script>";  
 }
  }
   $pass="SELECT password from tbllogin where email='$reg'"; 
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
    #signup{
     padding:10px;
     background-color:mediumblue;
     color:white;
    }
    #feedback{
        height:30px;
        width: 8 00px;
    }
    .container {
    width: px,500px;
    padding:100px 300px;
    background-color:#E6E8DD;
    }
    table {
    text-align:left;
    color:#040404;
    border-collapse: collapse;
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
        <h2>TESLA</h2>
        </div>
        <div class="search--notification--profile">
        <div></div>
                <h2>Welcome  <?php ECHO $uname;?></h2>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="profile.php" >
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item">My Profile</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="update_pass.php" >
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">  Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="admin_feed.php" id="active--link" >
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">FeedBack</span>
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
        <h1>FeedBack to Admin</h1>
        <div class="container">
        <form name="registr" id="registr" method="POST" action="#">
        <table>
           <tr> 
              <td><input type="text" name="feedback" id="feedback" autocomplete="off" required></td>
                </tr> 
            <tr>
                <td></td>
                <td></td>
               <td><input type="submit" value="SUBMIT" id="signup" name="signup" class="btn"></td>
            </tr> 
        </table>
        </form>
        </div>
        </div>
    </section>
    
</body>

</html>