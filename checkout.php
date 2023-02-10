<?php
   include 'connection.php';
   if(!isset($_SESSION["email"])) 
   {
       header("Location:index.php");
   }
   $reg=$_SESSION['email'];

   $result = mysqli_query($con,"SELECT * FROM `register`  where `email`='$reg'");
   while($row = mysqli_fetch_array($result))
   {
    $_SESSION['pin']=$row['pincode'];   
    $_SESSION['addr']=$row['address'];
   }  
    
   if(isset($_POST['signup']))
   {
     // receiving the values entered and storing in the variables
     //data sanitization is done to prevent SQL injections
     $pin=mysqli_real_escape_string($con,$_POST['pin']);
     $address=mysqli_real_escape_string($con,$_POST['address']);
    
     $qur1 = mysqli_query($con,"UPDATE register SET pincode='$pin', address='$address' where email='$reg'");
     if ( $qur1 === TRUE){
    header("location:checkout.php"); 
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> -->
    <title>User_Account</title>
    <style>
    .container {
    width: 500px,500px;
    padding:100px 300px;
    background-color:grey;
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

#pin,#address{
    height: 30px;
    width: 3 00px;

}
    </style>
</head>

<body>
    
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
            <li>
                    <a href="cart.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Back</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main--content">
        <div class="container">
        <table>						
        <form id="signup" class="form" method="POST" action="">
            <div class="form-field">
                <b>Pin Code</b>
                <input type="text" name="pin" id="pin" value="<?php echo $_SESSION['pin']; ?>" autocomplete="off">
                <small></small>
            </div>
            <div class="form-field">
                <b>Address</b>
                <input type="text" name="address"id="address" value="<?php echo $_SESSION['addr']; ?>" autocomplete="off">
                <small></small>
            </div>

            <div class="form-field">
                <input type="submit" value="Change" name="signup" class="btn">
            </div>
        </form> 
      </table>
      <div class="col-lg-4 offset-lg-4">
        <div class="checkout" style="background-color:blue; margin-top:10px; padding:10px; margin-right:500px;">
            <ul>
                <li style="text-align:center ;"><a style="color:white; font-size:20px;"  href="order_add.php? id=<?php echo $rows['id'];?>">Cash on Delivery</a>
            </li>
                
            </ul>
        </div>
    </div>
				</div>
        </div>
    </div>   
    </section>
</body>

</html>