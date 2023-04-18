<?php
   include 'connection.php';
   if(!isset($_SESSION["email"])) 
   {
       header("Location:index.php");
   }
   $reg=$_SESSION['email'];
   $id=$_SESSION['id'];
   if(isset($_POST['signup']))
  {
   $add=$_POST['address']; 
   $del="INSERT INTO `address`(`l_id`,`address`) VALUES ('$id','$add')";  
   $query_run = mysqli_query($con,$del);
   if($query_run)
 {
    echo "<script> alert('Address added Successfully'); </script>";	 
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
    #btn{
     padding:10px;
     background-color:mediumblue;
     color:white;

    }
    #old_password{
      height:30px;
      width: 300px;
    }
    #password{
        height:30px;
        width: 300px;
    }
    #confirm-password{
        height:30px;
        width: 300px;
    }
    .container {
    width: 500px,500px;
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
                <h2>Welcome  <?php ECHO $reg;?></h2>
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
                        <span class="sidebar--item">Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="feedback.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="address.php" id="active--link">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Address</span>
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
        <h1>ADD ADDRESS</h1>
        <div class="container">
        <form  method="POST" action="#">
        <table>
        <!--<tr> 
              <td><label for="old_password">Old Password:</label></td>
              <td><input type="password" name="old_password" id="old_password" onblur="Old_password()" autocomplete="off"></td>
           </tr> -->
           <tr> 
              <td><label for="address">Add Address</label></td>
              <td><input type="text" name="address" id="address" autocomplete="off"required></td>
           </tr> 
            <tr>
                <td></td>
                <td></td>
               <td><input type="submit" value="ADD" id="btn" name="signup" class="btn"></td>
            </tr> 
        </table>
        </form>
        </div>
		</div>
    </section>
    

</body>

</html>