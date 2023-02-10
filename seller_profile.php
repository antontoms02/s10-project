<?php
   include 'connection.php';
   if(!isset($_SESSION["email"])) 
   {
       header("Location:login2.php");
   }
   $reg=$_SESSION['email'];
   $result4 = mysqli_query($con,"SELECT * FROM `register` where `email`='$reg' AND role=2");
   while($row3 = mysqli_fetch_array($result4))
   {
   $uname=$row3['name'];
   $mobile=$row3['mob'];
   $email=$row3['email'];
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
                    <a href="seller_profile.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item">My Profile</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="seller_updatepass.php" >
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Change Password</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="seller.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Home</span>
                    </a>
                </li>
            </ul>
        </div>
        
        
        <div class="main--content">
        <div class="container">
						<table>
								<tr>
									<td valign="top"><b>Name</b></td>
									<td valign="top" style="text-align:center;"><?php echo  $uname; ?></td>
								</tr>
								<tr>
									<td><b>Mobile</b></td>
									<td style="text-align:center;"><?php echo $mobile; ?></td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td style="text-align:center;"><?php echo $email; ?></td>
								</tr>	
					    </table>
				</div>
        </div>
    </div>
        
    </section>
</body>

</html>